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
              'designation_id' => 1,
              'identity' => '001',
              'user_id' => 1,
              'company_id' => 1,
              'center_id' => 1,
              'scale_id' => 1,
              'level_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => '2080-01-01',
              'account_number' => '1111111',
              'bank_id' => 2,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employees')->insert([
              'designation_id' => 2,
              'identity' => '002',
              'user_id' => 2,
              'company_id' => 1,
              'center_id' => 1,
              'scale_id' => 1,
              'level_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => '2080-01-01',
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employees')->insert([
              'designation_id' => 3,
              'identity' => '009',
              'user_id' => 3,
              'company_id' => 1,
              'center_id' => 1,
              'scale_id' => 1,
              'level_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => '2080-01-01',
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

        DB::table('employees')->insert([
              'designation_id' => 4,
              'identity' => '010',
              'user_id' => 4,
              'company_id' => 1,
              'center_id' => 1,
              'scale_id' => 1,
              'level_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => '2080-01-01',
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
              'designation_id' => 9,
              'identity' => '025',
              'user_id' => 5,
              'company_id' => 1,
              'center_id' => 1,
              'scale_id' => 1,
              'level_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => '2080-01-01',
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation_id' => 5,
          'identity' => '031',
          'user_id' => 6,
          'company_id' => 1,
          'center_id' => 1,
          'scale_id' => 1,
          'level_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => '2080-01-01',
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation_id' => 6,
          'identity' => '027',
          'user_id' => 7,
          'company_id' => 1,
          'center_id' => 1,
          'scale_id' => 1,
          'level_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => '2080-01-01',
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);


        DB::table('employees')->insert([
          'designation_id' => 7,
          'identity' => '030',
          'user_id' => 8,
          'company_id' => 1,
          'center_id' => 1,
          'scale_id' => 1,
          'level_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => '2080-01-01',
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation_id' => 8,
          'identity' => '032',
          'user_id' => 9,
          'company_id' => 1,
          'center_id' => 1,
          'scale_id' => 1,
          'level_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => '2080-01-01',
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);


    }
}
