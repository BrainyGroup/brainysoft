<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Deduction_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('deduction_types')->truncate();

      DB::table('deduction_types')->insert([
        'name' => 'Advance Salary',
        'description' => 'Advance Salary Deduction',
        'company_id' => 1,
        'created_at' =>now(),
        'updated_at' =>now(),
    ]);

      DB::table('deduction_types')->insert([
              'name' => 'Loan',
              'description' => 'Loan Deduction',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('deduction_types')->insert([
              'name' => 'Share',
              'description' => 'Share Deduction',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


    //   DB::table('deduction_types')->insert([
    //           'name' => 'HESLB',
    //           'description' => 'Higher Education Students Loan Board',
    //           'company_id' => 1,
    //           'created_at' =>now(),
    //           'updated_at' =>now(),
    //       ]);


      DB::table('deduction_types')->insert([
              'name' => 'Contribution',
              'description' => 'Contribution',            
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
