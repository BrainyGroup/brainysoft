<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('countries')->truncate();

      DB::table('countries')->insert([
              'name' => 'Tanzaia',
          ]);

      DB::table('countries')->insert([
              'name' => 'Kenya',
          ]);

      DB::table('countries')->insert([
              'name' => 'Uganda',
          ]);

      DB::table('countries')->insert([
              'name' => 'Rwanda',
          ]);

      DB::table('countries')->insert([
              'name' => 'Burundi',
          ]);

      DB::table('countries')->insert([
              'name' => 'South Sudan',
          ]);
    }
}
