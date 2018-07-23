<?php

use Illuminate\Database\Seeder;

class Allowance_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('allowance_types')->truncate();

      DB::table('allowance_types')->insert([
              'name' => 'Overtime',
              'description' => 'Overtime',
          ]);

      DB::table('allowance_types')->insert([
              'name' => 'House',
              'description' => 'House Allowance',
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Travel',
              'description' => 'Travel Allowance',
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Transport',
              'description' => 'Transport Allowance',
          ]);

      DB::table('allowance_types')->insert([
              'name' => 'Leave',
              'description' => 'Leave Allowance',
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Medical',
              'description' => 'Medical Allowance',
          ]);

      DB::table('allowance_types')->insert([
              'name' => 'Marketing',
              'description' => 'Marketing Allowance',
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Training',
              'description' => 'Training Allowance',
          ]);
    }
}
