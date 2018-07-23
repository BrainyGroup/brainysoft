<?php

use Illuminate\Database\Seeder;

class ScalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('scales')->truncate();

      DB::table('scales')->insert([
              'name' => 'DGSS',
              'description' => 'Datahouse General Salary Scale',
              'company_id' => 1,
              'minimum' => '200000',
              'maximum' => '4000000',
              'schedule' => 'monthly',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('scales')->insert([
              'name' => 'DSSS',
              'description' => 'Datahouse Scanning Salary Scales',
              'company_id' => 1,
              'minimum' => '10000',
              'maximum' => '20000',
              'schedule' => 'daily',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('scales')->insert([
              'name' => 'DSSS',
              'description' => 'Datahouse Data Entry Salary Scales',
              'company_id' => 1,
              'minimum' => '10000',
              'maximum' => '20000',
              'schedule' => 'daily',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);



    }
}
