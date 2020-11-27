<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
              'created_at' => now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 0.00,
              'employee_id' => 2,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>'3000-01-01',
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deductions')->insert([
              'amount' => 600000.00,
              'employee_id' => 8,
              'deduction_type_id' => 1,
              'company_id' => 1,
              'start_date' => now(),
              'end_date' =>Carbon::now()->addMonthsNoOverflow(6),
              'interest' => 0.10,
              'interest_amount' => 60000.00,
              'date_taken' => now(),
              'period' => 6,
              'total_amount' => 660000.00,
              'status' => 1,
              'balance' => 660000.00,
              'monthly_amount' => 110000.00,
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
              'interest' => 0,
              'interest_amount' => 0,
              'date_taken' => now(),
              'period' => 0,
              'total_amount' => 0.00,
              'status' => 10,
              'balance' => 0,
              'monthly_amount' => 0.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
