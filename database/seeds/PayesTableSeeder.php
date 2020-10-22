<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
              'country_id' => 1,              
              'minimum' => 0.00,
              'maximum' => 270000.00,
              'ratio' => 0.00,
              'offset' => 0.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'country_id' => 1,
              'minimum' => 270000.00,
              'maximum' => 520000.00,
              'ratio' => 0.0900,
              'offset' => 0.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'country_id' => 1,
              'minimum' => 5200000.00,
              'maximum' => 760000.00,
              'ratio' => 0.2000,
              'offset' =>22500.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'country_id' => 1,
              'minimum' => 760000.00,
              'maximum' => 1000000.00,
              'ratio' => 0.2500,
              'offset' => 70500.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('payes')->insert([
              'country_id' => 1,
              'minimum' => 1000000.00,
              'maximum' => 100000000.00,
              'ratio' => 0.3000,
              'offset' => 130500.00,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
