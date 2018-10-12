<?php

use Illuminate\Database\Seeder;

class CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('centers')->truncate();

      DB::table('centers')->insert([
              'name' => 'HQ',
              'description' => 'Head Quota',
              'company_id' => 1,
              'number' => '0001',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('centers')->insert([
              'name' => 'Vodacom',
              'description' => 'Vodacom Project',
              'company_id' => 1,
              'number' => '0002',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('centers')->insert([
              'name' => 'Airtel',
              'description' => 'Airtel Project',
              'company_id' => 1,
              'number' => '0003',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
