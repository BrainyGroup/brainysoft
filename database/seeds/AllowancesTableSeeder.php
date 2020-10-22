<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use BrainySoft\Payroll\Role;
use BrainySoft\Payroll\Permission;
use BrainySoft\Payroll\Permission_role;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as Router;
use Illuminate\Support\Facades\Schema;

class AllowancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('allowances')->truncate();


      DB::table('allowances')->insert([
              'amount' => 0.00,
              'employee_id' => 1,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 0.00,
              'employee_id' => 2,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 3,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 400000.00,
              'employee_id' => 4,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 509000.00,
              'employee_id' => 5,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 6,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 21000.00,
              'employee_id' => 7,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 8,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowances')->insert([
              'amount' => 87000.00,
              'employee_id' => 9,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


          DB::table('levels')->truncate();

      DB::table('levels')->insert([
              'name' => 'Excutive',
              'description' => 'Chiefs',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('levels')->insert([
              'name' => 'Directors',
              'description' => 'Directors and Heads',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),

          ]);

      DB::table('levels')->insert([
              'name' => 'Managers',
              'description' => 'Managers',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),

          ]);


      DB::table('levels')->insert([
              'name' => 'Supervisors',
              'description' => 'Supervisors',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),

          ]);

      DB::table('levels')->insert([
              'name' => 'Officers',
              'description' => 'Officers',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),

          ]);

          DB::table('designations')->truncate();

          DB::table('designations')->insert([
                  'name' => 'MD',
                  'description' => 'Managing Director',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1, 
                  'created_at' =>now(),
                  'updated_at' =>now(),
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'BDM',
                  'description' => 'Business Development Manager',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1, 
                  'created_at' =>now(),
                  'updated_at' =>now(),                           
    
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'PS',
                  'description' => 'Project supervisor',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1,
                  'created_at' =>now(),
                  'updated_at' =>now(), 
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'PLO',
                  'description' => 'Procurement & Logistic Officer',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1,
                  'created_at' =>now(),
                  'updated_at' =>now(), 
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'EE',
                  'description' => 'Electronic Engineer',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1, 
                  'created_at' =>now(),
                  'updated_at' =>now(),
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'SE',
                  'description' => 'Software Engineer',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1,
                  'created_at' =>now(),
                  'updated_at' =>now(), 
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'Developer',
                  'description' => 'Developer',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1, 
                  'created_at' =>now(),
                  'updated_at' =>now(),
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'Accountant',
                  'description' => 'Accountant',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1,
                  'created_at' =>now(),
                  'updated_at' =>now(), 
              ]);
    
          DB::table('designations')->insert([
                  'name' => 'Office Administrator',
                  'description' => 'Office Administrator',
                  'company_id' => 1,
                  'scale_id' => 1,
                  'level_id' => 1,
                  'created_at' =>now(),
                  'updated_at' =>now(), 
              ]);

              DB::table('employee_statutories')->truncate();


      DB::table('employee_statutories')->insert([
              'employee_id' => 1,
              'statutory_id' => 1,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
      DB::table('employee_statutories')->insert([
              'employee_id' => 1,
              'statutory_id' => 3,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 1,
              'statutory_id' => 4,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 1,
              'statutory_id' => 5,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


      DB::table('employee_statutories')->insert([
              'employee_id' => 2,
              'statutory_id' => 1,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
      DB::table('employee_statutories')->insert([
              'employee_id' => 2,
              'statutory_id' => 3,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 2,
              'statutory_id' => 4,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 2,
              'statutory_id' => 5,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employee_statutories')->insert([
              'employee_id' =>3,
              'statutory_id' => 2,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
              ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 3,
              'statutory_id' => 3,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
              ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 3,
              'statutory_id' => 4,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employee_statutories')->insert([
              'employee_id' => 3,
              'statutory_id' => 5,
              'company_id' => 1,
              'employee_statutory_no' => '',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


          DB::table('employee_statutories')->insert([
                  'employee_id' => 4,
                  'statutory_id' => 2,
                  'company_id' => 1,
                  'employee_statutory_no' => '',
                  'created_at' =>now(),
                  'updated_at' =>now(),
              ]);
          DB::table('employee_statutories')->insert([
                  'employee_id' => 4,
                  'statutory_id' => 3,
                  'company_id' => 1,
                  'employee_statutory_no' => '',
                  'created_at' =>now(),
                  'updated_at' =>now(),
              ]);

          DB::table('employee_statutories')->insert([
                  'employee_id' => 4,
                  'statutory_id' => 4,
                  'company_id' => 1,
                  'employee_statutory_no' => '',
                   'created_at' =>now(),
                   'updated_at' =>now(),
              ]);

          DB::table('employee_statutories')->insert([
                  'employee_id' => 4,
                  'statutory_id' => 5,
                  'company_id' => 1,
                  'employee_statutory_no' => '',
                  'created_at' =>now(),
                  'updated_at' =>now(),
              ]);

              DB::table('employee_statutories')->insert([
                      'employee_id' => 5,
                      'statutory_id' => 1,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);
              DB::table('employee_statutories')->insert([
                      'employee_id' => 5,
                      'statutory_id' => 3, 
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                       'updated_at' =>now(),
                  ]);

              DB::table('employee_statutories')->insert([
                      'employee_id' => 5,
                      'statutory_id' => 4,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);

              DB::table('employee_statutories')->insert([
                      'employee_id' => 5,
                      'statutory_id' => 5,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);


              DB::table('employee_statutories')->insert([
                      'employee_id' => 6,
                      'statutory_id' => 1,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);

              DB::table('employee_statutories')->insert([
                      'employee_id' => 6,
                      'statutory_id' => 3,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);

              DB::table('employee_statutories')->insert([
                      'employee_id' => 6,
                      'statutory_id' => 4,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);

              DB::table('employee_statutories')->insert([
                      'employee_id' => 6,
                      'statutory_id' => 5,
                      'company_id' => 1,
                      'employee_statutory_no' => '',
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);
                  DB::table('employee_statutories')->insert([
                          'employee_id' => 7,
                          'statutory_id' => 1,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);
                  DB::table('employee_statutories')->insert([
                          'employee_id' => 7,
                          'statutory_id' => 3,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);

                  DB::table('employee_statutories')->insert([
                          'employee_id' => 7,
                          'statutory_id' => 4,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);

                  DB::table('employee_statutories')->insert([
                          'employee_id' => 7,
                          'statutory_id' => 5,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);


                  DB::table('employee_statutories')->insert([
                          'employee_id' => 8,
                          'statutory_id' => 1,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);

                  DB::table('employee_statutories')->insert([
                          'employee_id' => 8,
                          'statutory_id' => 3,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);

                  DB::table('employee_statutories')->insert([
                          'employee_id' => 8,
                          'statutory_id' => 4,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);

                  DB::table('employee_statutories')->insert([
                          'employee_id' => 8,
                          'statutory_id' => 5,
                          'company_id' => 1,
                          'employee_statutory_no' => '',
                          'created_at' =>now(),
                          'updated_at' =>now(),
                      ]);

                      DB::table('employee_statutories')->insert([
                              'employee_id' => 9,
                              'statutory_id' => 1,
                              'company_id' => 1,
                              'employee_statutory_no' => '',
                              'created_at' =>now(),
                              'updated_at' =>now(),
                          ]);

                      DB::table('employee_statutories')->insert([
                              'employee_id' => 9,
                              'statutory_id' => 3,
                              'company_id' => 1,
                              'employee_statutory_no' => '',
                              'created_at' =>now(),
                              'updated_at' =>now(),
                          ]);

                      DB::table('employee_statutories')->insert([
                              'employee_id' => 9,
                              'statutory_id' => 4,
                              'company_id' => 1,
                              'employee_statutory_no' => '',
                              'created_at' =>now(),
                              'updated_at' =>now(),
                          ]);

                      DB::table('employee_statutories')->insert([
                              'employee_id' => 9,
                              'statutory_id' => 5,
                              'company_id' => 1,
                              'employee_statutory_no' => '',
                              'created_at' =>now(),
                              'updated_at' =>now(),
                          ]);

                          DB::table('pays')->truncate();

                          DB::table('pay_statutories')->truncate();

                          DB::table('departments')->truncate();

                          DB::table('departments')->insert([
                                  'name' => 'All',
                                  'description' => 'All staff',
                                  'company_id' => 1,
                                  'created_at' =>now(),
                                  'updated_at' =>now(),
                              ]);
                    DB::table('payroll_groups')->truncate();

                    DB::table('payroll_groups')->insert([
                            'name' => 'All',
                            'description' => 'All staff',
                            'company_id' => 1,
                            'created_at' =>now(),
                            'updated_at' =>now(),
                        ]);

                        DB::table('kin_types')->truncate();

                        DB::table('kin_types')->insert([
                                'name' => 'Mother',
                                'description' => 'Parents',
                                'company_id' => 1,
                                'created_at' =>now(),
                                'updated_at' =>now(),
                            ]);
                  
                        DB::table('kin_types')->insert([
                                'name' => 'Father',
                                'description' => 'Parents',
                                'company_id' => 1,
                                'created_at' =>now(),
                                'updated_at' =>now(),
                            ]);
                      DB::table('kin_types')->insert([
                              'name' => 'Wife',
                              'description' => 'Spouse',
                              'company_id' => 1,
                              'created_at' =>now(),
                              'updated_at' =>now(),
                          ]);
                  
                      DB::table('kin_types')->insert([
                              'name' => 'Husband',
                              'description' => 'Spouse',
                              'company_id' => 1,
                              'created_at' =>now(),
                              'updated_at' =>now(),
                          ]);

                          DB::table('employment_types')->truncate();

                          DB::table('employment_types')->insert([
                                  'name' => 'Contract',
                                  'description' => 'Contract',
                                  'company_id' => 1,
                                  'created_at' =>now(),
                                  'updated_at' =>now(),
                              ]);
                    
                         DB::table('employment_types')->insert([
                                  'name' => 'Permanent',
                                  'description' => 'Permanent',
                                  'company_id' => 1,
                                  'created_at' =>now(),
                                  'updated_at' =>now(),
                              ]);
                    
                        
                         DB::table('employment_types')->insert([
                                  'name' => 'Casual',
                                  'description' => 'Casual',
                                  'company_id' => 1,
                                  'created_at' =>now(),
                                  'updated_at' =>now(),
                              ]);

                              DB::table('pay_bases')->truncate();

      DB::table('pay_bases')->insert([
              'name' => 'monthly',
              'description' => 'Monthly',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

     DB::table('pay_bases')->insert([
              'name' => 'fortynight',
              'description' => 'Permanent',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

    
     DB::table('pay_bases')->insert([
              'name' => 'Weekly',
              'description' => 'Weekly',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    
     DB::table('pay_bases')->insert([
              'name' => 'Daily',
              'description' => 'Daily',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    
     DB::table('pay_bases')->insert([
              'name' => 'Hourly',
              'description' => 'Hourly',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
     
     DB::table('pay_bases')->insert([
              'name' => 'Pages',
              'description' => 'Pages',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

          //Schema::disableForeignKeyConstraints();

    
          DB::table('roles')->insert([    
            ['name' => 'admin',
            'company_id' => 1,
            'created_at' =>now(),
            'updated_at' =>now()],
            ['name' => 'operator','company_id' => 1, 'created_at' =>now(),
            'updated_at' =>now()],
            ['name' => 'employee', 'company_id' => 1,'created_at' =>now(),
            'updated_at' =>now()],
            ['name' => 'employer','company_id' => 1, 'created_at' =>now(),
            'updated_at' =>now()],
            ['name' => 'user', 'company_id' => 1,'created_at' =>now(),
            'updated_at' =>now()],  
            ]);

            DB::table('permission_role')->truncate();


        //     DB::table('basic_settings')->truncate();

        //   foreach ($this->settings as $index => $setting)
        //   {
        //       $result = DB::table('basic_settings')->insert($setting);
        //       //$result = BasicSetting::create($setting);
        //       if (!$result) {
        //           $this->command->info("Insert failed at record $index.");
        //           return;
        //       }
        //   }
        //   $this->command->info('Inserted '.count($this->settings). ' records');

           

            $permission_ids = []; // an empty array of stored permission IDs
        // iterate though all routes

        $routeCollection = Route::getRoutes(); 
        
        foreach (Route::getRoutes()->getRoutes() as $key => $route)
        {
            // get route action

            $action = $route->getActionname();

            // separating controller and method

            $_action = explode('@',$action);
            
            $controller = $_action[0];            

            $controller_name = substr(substr($controller, 28), 0, -10);

            $method = end($_action);
            
            // check if this permission is already exists

            $permission_check = Permission::where(
                    ['controller'=>$controller,'method'=>$method]
                )->first();

            if(!$permission_check){
                $permission = new Permission;
                $permission->name = $controller_name. ' ' .$method ;
                $permission->controller = $controller;
                $permission->method = $method;
                $permission->save();
                // add stored permission id in array
                $permission_ids[] = $permission->id;
            }
        }
        // find admin role.
        $admin_role = Role::where('name','admin')->first();
        // atache all permissions to admin role
        $admin_role->permissions()->attach($permission_ids);

        //find Operator role
                // find admin role.
                $operator_role = Role::where('name','operator')->first();
                // atache all permissions to admin role
                $operator_role->permissions()->attach([1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102]);

                $employer_role = Role::where('name','employer')->first();
                // atache all permissions to admin role
                $employer_role->permissions()->attach([1,2,3,4,5,6,7,8,9,11,12,13,22]);


                $employee_role = Role::where('name','employee')->first();
                // atache all permissions to admin role
                $employee_role->permissions()->attach([1,2,3,4,5,6,7,8,9,12,13, 246, 250, 88, 224, 261, 262]);


                $user_role = Role::where('name','user')->first();
                // atache all permissions to admin role
                $user_role->permissions()->attach([1,2,3,4,5,6,7,8,9,12,13]);
        
       //delete unwanted roles
       

      
    //    DB::table('permission_role')
    //             ->where('role_id', 2)
    //             ->where('permission_id', '>=', 43)
    //            ->where('permission_id', '<=', 56)->delete();

          
    }
}
