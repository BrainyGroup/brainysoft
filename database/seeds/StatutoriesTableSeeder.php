<?php

use Illuminate\Database\Seeder;

class StatutoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('statutories')->truncate();

      DB::table('statutories')->insert([
              'name' => 'NSSF',
              'description' => 'National Social Security Fund',
              'organization_id' => 1,
              'company_id' => 1,
              'employee' => 0.100,
              'employer' => 0.100,
              'total' => 0.200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 1,
              'base_id' => 1,
          ]);

      DB::table('statutories')->insert([
              'name' => 'PPF',
              'description' => 'Parastatal Pension Fund',
              'organization_id' => 1,
              'company_id' => 1,
              'employee' => 0.100,
              'employer' => 0.100,
              'total' => 0.200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 1,
              'base_id' => 1,
          ]);

      DB::table('statutories')->insert([
              'name' => 'NHIF',
              'description' => 'National Health Insurance Fund',
              'organization_id' => 2,
              'company_id' => 1,
              'employee' => 0.0300,
              'employer' => 0.0300,
              'total' => 0.0600,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 2,
              'base_id' => 1,
          ]);

      DB::table('statutories')->insert([
              'name' => 'WCF',
              'description' => 'Worker Compasation Fund',
              'organization_id' => 4,
              'company_id' => 1,
              'employee' => 0.0100,
              'employer' => 0.0100,
              'total' => 0.0200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 3,
              'base_id' => 2,
          ]);

      DB::table('statutories')->insert([
              'name' => 'SDL',
              'description' => 'School Development Levy',
              'organization_id' => 4,
              'company_id' => 1,
              'employee' => 0.0100,
              'employer' => 0.0100,
              'total' => 0.0200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 3,
              'base_id' => 2,
          ]);
    }
}
