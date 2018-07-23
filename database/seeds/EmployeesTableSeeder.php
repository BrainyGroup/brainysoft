<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('employees')->truncate();

      DB::table('employees')->insert([
              'designation' => 'Managing Director',
              'identity' => '001',
              'user_id' => 1,
              'company_id' => 1,
              'center_id' => 1,
              'scales_id' => 1,
              'startdate' => '2011-01-01',
              'enddate' => '2080-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employees')->insert([
              'designation' => 'Business Development Manager',
              'identity' => '002',
              'user_id' => 2,
              'company_id' => 1,
              'center_id' => 1,
              'scales_id' => 1,
              'startdate' => '2011-01-01',
              'enddate' => '2080-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employees')->insert([
              'designation' => 'Project Supervisor',
              'identity' => '009',
              'user_id' => 3,
              'company_id' => 1,
              'center_id' => 1,
              'scales_id' => 1,
              'startdate' => '2011-01-01',
              'enddate' => '2080-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

        DB::table('employees')->insert([
              'designation' => 'Procurement and logistic Officer',
              'identity' => '010',
              'user_id' => 4,
              'company_id' => 1,
              'center_id' => 1,
              'scales_id' => 1,
              'startdate' => '2011-01-01',
              'enddate' => '2080-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
              'designation' => 'Electronic Engineer',
              'identity' => '025',
              'user_id' => 5,
              'company_id' => 1,
              'center_id' => 1,
              'scales_id' => 1,
              'startdate' => '2011-01-01',
              'enddate' => '2080-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation' => 'Sofware Engineer',
          'identity' => '031',
          'user_id' => 6,
          'company_id' => 1,
          'center_id' => 1,
          'scales_id' => 1,
          'startdate' => '2011-01-01',
          'enddate' => '2080-01-01',
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation' => 'Developer',
          'identity' => '027',
          'user_id' => 7,
          'company_id' => 1,
          'center_id' => 1,
          'scales_id' => 1,
          'startdate' => '2011-01-01',
          'enddate' => '2080-01-01',
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);


        DB::table('employees')->insert([
          'designation' => 'Accountant',
          'identity' => '030',
          'user_id' => 8,
          'company_id' => 1,
          'center_id' => 1,
          'scales_id' => 1,
          'startdate' => '2011-01-01',
          'enddate' => '2080-01-01',
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation' => 'Office Administrator',
          'identity' => '031',
          'user_id' => 9,
          'company_id' => 1,
          'center_id' => 1,
          'scales_id' => 1,
          'startdate' => '2011-01-01',
          'enddate' => '2080-01-01',
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        
    }
}
