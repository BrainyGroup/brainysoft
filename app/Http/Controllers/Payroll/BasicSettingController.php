<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use BrainySoft\Payroll\BasicSetting;
use BrainySoft\Http\Controllers\BaseController;
use Illuminate\Http\UploadedFile;
use BrainySoft\Traits\UploadAble;
use BrainySoft\Http\Controllers\Controller;


class BasicSettingController extends BaseController
{

    use UploadAble;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct()
    {

         $this->middleware('permission:basic_setting-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:basic_setting-create', ['only' => ['create','store']]);
         $this->middleware('permission:basic_setting-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:basic_setting-delete', ['only' => ['destroy']]);

    }
    
    public function index()
    {
        $this->setPageTitle('Settings', 'Manage Settings');
        return view('basic_settings.index');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {

        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'img');
            BasicSetting::set('site_logo', $logo);
    
        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {
    
            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            BasicSetting::set('site_favicon', $favicon);
    
        } else {
    
            $keys = $request->except('_token');
    
            foreach ($keys as $key => $value)
            {
                BasicSetting::set($key, $value);
            }
        }
        return $this->responseRedirectBack('Settings updated successfully.', 'success');
    }
}
