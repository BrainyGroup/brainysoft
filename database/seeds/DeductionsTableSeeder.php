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
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 2,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 3,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 69300.00,
              'employee_id' => 4,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 90750.00,
              'employee_id' => 5,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 81510.00,
              'employee_id' => 6,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 7,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 87780.00,
              'employee_id' => 8,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 9,
              'company_id' => 1,
              'deduction_type_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
