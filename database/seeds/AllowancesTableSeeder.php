<?php

use Illuminate\Database\Seeder;

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
              'user_id' => 1,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 0.00,
              'employee_id' => 2,
              'user_id' => 2,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 3,
              'user_id' => 3,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 400000.00,
              'employee_id' => 4,
              'user_id' => 4,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 508000.00,
              'employee_id' => 5,
              'user_id' => 5,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 6,
              'user_id' => 6,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 21000.00,
              'employee_id' => 7,
              'user_id' => 7,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 8,
              'user_id' => 8,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 87000.00,
              'employee_id' => 9,
              'user_id' => 9,
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);
    }
}
