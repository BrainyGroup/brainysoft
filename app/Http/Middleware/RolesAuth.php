<?php

namespace BrainySoft\Http\Middleware;

use Closure;
use BrainySoft\Payroll\Role;

class RolesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get user role permissions
        if(!isset(auth()->user()->role_id)){
            return redirect('/login');
        }
        
        $role = Role::findOrFail(auth()->user()->role_id);

        
        $permissions = $role->permissions;

       
        // get requested action
        $actionName = class_basename($request->route()->getActionname());
        // check if requested action is in permissions list
        
        foreach ($permissions as $permission)
        {
            $_namespaces_chunks = explode('\\', $permission->controller);
            $controller = end($_namespaces_chunks);

            

            if ($actionName == $controller . '@' . $permission->method)
            {
                // authorized request
                return $next($request);
            }
        }
        // none authorized request
        //return response('Unauthorized Action', 403);
        return back()->with('error','Unauthorized Action');
        
    }
}
