<?php
namespace Database\Seeders;

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

    

          
    }
}
