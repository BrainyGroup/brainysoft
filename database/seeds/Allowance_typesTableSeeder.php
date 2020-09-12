<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowance_types')->insert([
              'name' => 'House',
              'description' => 'House Allowance',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Travel',
              'description' => 'Travel Allowance',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Transport',
              'description' => 'Transport Allowance',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('allowance_types')->insert([
              'name' => 'Leave',
              'description' => 'Leave Allowance',
              'company_id' => 1,
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Medical',
              'description' => 'Medical Allowance',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),              
          ]);

      DB::table('allowance_types')->insert([
              'name' => 'Marketing',
              'description' => 'Marketing Allowance',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),            
          ]);


      DB::table('allowance_types')->insert([
              'name' => 'Training',
              'description' => 'Training Allowance',              
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),              
          ]);
    }
}
