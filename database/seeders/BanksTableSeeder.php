<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
              'country_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('banks')->insert([
              'name' => 'CRDB Bank',
              'description' => 'CRDB Bank',            
              'company_id' => 1,
              'country_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
