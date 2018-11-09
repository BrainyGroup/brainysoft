<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('organizations')->truncate();

      DB::table('organizations')->insert([
              'name' => 'NSSF',
              'description' => 'National Social Security Fund',
              'statutory_type_id' => 1,
              'company_id' => 1,
              'country_id' => 1,
              'bank_id' => 1,
              'account_number' => '2345678999',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('organizations')->insert([
              'name' => 'PPF',
              'description' => 'Parastatus Pension Fund',
              'statutory_type_id' => 1,
              'company_id' => 1,
              'country_id' => 1,
              'bank_id' => 2,
              'account_number' => '222222222222',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('organizations')->insert([
              'name' => 'NHIF',
              'description' => 'National Health Insurance Fund',
              'statutory_type_id' => 2,
              'company_id' => 1,
              'country_id' => 1,
              'bank_id' => 1,
              'account_number' => '3456378999',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('organizations')->insert([
              'name' => 'WCF',
              'description' => 'Worker Compasation Fund',
              'statutory_type_id' => 3,
              'company_id' => 1,
              'country_id' => 1,
              'bank_id' => 1,
              'account_number' => '734567888',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('organizations')->insert([
              'name' => 'TRA',
              'description' => 'Tanzania Revenue Authority',
              'statutory_type_id' => 4,
              'company_id' => 1,
              'country_id' => 1,
              'bank_id' => 1,
              'account_number' => '334557111',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
