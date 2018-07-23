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
          ]);

      DB::table('deduction_types')->insert([
              'name' => 'Share',
              'description' => 'Share Deduction',
          ]);


      DB::table('deduction_types')->insert([
              'name' => 'HESLB',
              'description' => 'Higher Education Loan Board',
          ]);


      DB::table('deduction_types')->insert([
              'name' => 'Contribution',
              'description' => 'Contribution',
          ]);
    }
}
