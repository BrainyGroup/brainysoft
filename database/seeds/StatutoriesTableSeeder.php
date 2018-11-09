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
              'before_paye' => true,
              'selection' => true,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('statutories')->insert([
              'name' => 'PPF',
              'description' => 'Parastatal Pension Fund',
              'organization_id' => 2,
              'company_id' => 1,
              'employee' => 0.100,
              'employer' => 0.100,
              'total' => 0.200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 1,
              'base_id' => 1,
              'before_paye' => true,
              'selection' => true,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('statutories')->insert([
              'name' => 'NHIF',
              'description' => 'National Health Insurance Fund',
              'organization_id' => 3,
              'company_id' => 1,
              'employee' => 0.0300,
              'employer' => 0.0300,
              'total' => 0.0600,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 2,
              'base_id' => 1,
              'before_paye' => false,
              'selection' => true,
              'mandatory' => false,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('statutories')->insert([
              'name' => 'WCF',
              'description' => 'Worker Compasation Fund',
              'organization_id' => 4,
              'company_id' => 1,
              'employee' => 0.000,
              'employer' => 0.0100,
              'total' => 0.0100,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 3,
              'base_id' => 2,
              'before_paye' => false,
              'selection' => false,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('statutories')->insert([
              'name' => 'SDL',
              'description' => 'School Development Levy',
              'organization_id' => 5,
              'company_id' => 1,
              'employee' => 0.0000,
              'employer' => 0.0450,
              'total' => 0.0450,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 4,
              'base_id' => 2,
              'before_paye' => false,
              'selection' => false,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
