<?php

use Illuminate\Database\Seeder;

class PayesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payes')->truncate();

      DB::table('payes')->insert([
              'company_id' => 1,
              'minimum' => 0.00,
              'maximum' => 170000.00,
              'ratio' => 0.00,
              'offset' => 0.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'company_id' => 1,
              'minimum' => 170000.00,
              'maximum' => 360000.00,
              'ratio' => 0.0900,
              'offset' => 0.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'company_id' => 1,
              'minimum' => 360000.00,
              'maximum' => 540000.00,
              'ratio' => 0.2000,
              'offset' =>17100.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'company_id' => 1,
              'minimum' => 540000.00,
              'maximum' => 720000.00,
              'ratio' => 0.2500,
              'offset' => 53100.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'company_id' => 1,
              'minimum' => 720000.00,
              'maximum' => 100000000.00,
              'ratio' => 0.3000,
              'offset' => 98100.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
