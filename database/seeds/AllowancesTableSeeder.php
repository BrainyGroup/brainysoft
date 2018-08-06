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
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 0.00,
              'employee_id' => 2,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 3,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 400000.00,
              'employee_id' => 4,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 508000.00,
              'employee_id' => 5,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 6,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 21000.00,
              'employee_id' => 7,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 370000.00,
              'employee_id' => 8,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);

      DB::table('allowances')->insert([
              'amount' => 87000.00,
              'employee_id' => 9,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => 1,
              'allowance_type_id' => 1,
          ]);
    }
}
