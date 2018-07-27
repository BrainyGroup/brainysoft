<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('banks')->truncate();

      DB::table('banks')->insert([
              'name' => 'Exim Bank',
              'description' => 'Exim Bank',
              'company_id' => 1,
          ]);

      DB::table('banks')->insert([
              'name' => 'CRDB Bank',
              'description' => 'CRDB Bank',            
              'company_id' => 1,
          ]);
    }
}
