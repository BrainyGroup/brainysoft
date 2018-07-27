<?php

use Illuminate\Database\Seeder;

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
              'name' => 'Loan',
              'description' => 'Loan Deduction',

              'company_id' => 1,
          ]);

      DB::table('deduction_types')->insert([
              'name' => 'Share',
              'description' => 'Share Deduction',

              'company_id' => 1,
          ]);


      DB::table('deduction_types')->insert([
              'name' => 'HESLB',
              'description' => 'Higher Education Loan Board',

              'company_id' => 1,
          ]);


      DB::table('deduction_types')->insert([
              'name' => 'Contribution',
              'description' => 'Contribution',
            
              'company_id' => 1,
          ]);
    }
}
