<?php

use Illuminate\Database\Seeder;

class DeductionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('deductions')->truncate();


      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 1,
              'deduction_type_id' => 1,
              'user_id' => 1,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 2,
              'deduction_type_id' => 1,
              'user_id' => 2,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 3,
              'deduction_type_id' => 1,
              'user_id' => 3,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 69300.00,
              'employee_id' => 4,
              'deduction_type_id' => 1,
              'user_id' => 4,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 90750.00,
              'employee_id' => 5,
              'deduction_type_id' => 1,
              'user_id' => 5,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 81510.00,
              'employee_id' => 6,
              'deduction_type_id' => 1,
              'user_id' => 6,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 7,
              'deduction_type_id' => 1,
              'user_id' => 7,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 87780.00,
              'employee_id' => 8,
              'deduction_type_id' => 1,
              'user_id' => 8,
              'company_id' => 1,
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 9,
              'user_id' => 9,
              'company_id' => 1,
              'deduction_type_id' => 1,
          ]);
    }
}
