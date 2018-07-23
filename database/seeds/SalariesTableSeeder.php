<?php

use Illuminate\Database\Seeder;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('salaries')->truncate();

      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 1,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 1,
              'amount' => 2255000.00,
              'accountnumber' => '1111111',
              'bank_id' => 2,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 2,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 2,
              'amount' => 2200000.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 3,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 3,
              'amount' => 418000.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 4,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 4,
              'amount' => 462000.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 5,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 5,
              'amount' => 605000.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
                ]);

      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 6,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 6,
              'amount' => 543400.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 7,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 7,
              'amount' => 275000.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 8,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 8,
              'amount' => 585200.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salaries')->insert([
              'company_id' => 1,
              'user_id' => 9,
              'scale_id' => 1,
              'center_id' => 1,
              'employee_id' => 9,
              'amount' => 265000.00,
              'accountnumber' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

    }
}
