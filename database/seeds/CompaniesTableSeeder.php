<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('companies')->truncate();

      DB::table('companies')->insert([
              'name' => 'Datahouse',
              'description' => 'Datahouse Tanzania Limited',
              'country_id' => 1,
              'logo' => 'logo_1.png',
              'website' => 'www.datahousetza.com',
              'tin' => '222-222-222',
              'vrn' => '345Y-342',
              'regno' => '200000',
              'slogan' => 'For Dynamic World',
              'mission' => 'monthly',
              'vision' => 'monthly',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

          DB::table('companies')->insert([
              'name' => 'BrainySoft',
              'description' => 'BrainySoft Tanzania Limited',
              'country_id' => 1,
              'logo' => 'logo_2.png',
              'website' => 'www.brainysoft.com',
              'tin' => '111-111-111',
              'vrn' => '345Y-454',
              'regno' => '200222',
              'slogan' => 'Agily World',
              'mission' => 'monthly',
              'vision' => 'monthly',
              'created_at' =>now(),
              'updated_at' =>now(),
              ]);

    }
}
