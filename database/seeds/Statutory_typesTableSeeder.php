<?php

use Illuminate\Database\Seeder;

class Statutory_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('statutory_types')->truncate();

      DB::table('statutory_types')->insert([
              'name' => 'SSF',
              'description' => 'Social Security Fund',
              'company_id' => 1,
          ]);

      DB::table('statutory_types')->insert([
              'name' => 'HI',
              'description' => 'Health Insurance',
              'company_id' => 1,
          ]);


      DB::table('statutory_types')->insert([
              'name' => 'WCF',
              'description' => 'Worker Compasation Fund',
              'company_id' => 1,
          ]);


      DB::table('statutory_types')->insert([
              'name' => 'SDL',
              'description' => 'School Development Levy',              
              'company_id' => 1,
          ]);
    }
}
