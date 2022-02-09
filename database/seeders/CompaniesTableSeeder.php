<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
              'district' => 'Ilala',
              'region' => 'Dar es salaam',
              'pobox' => '637',
              'website' => 'www.datahousetza.com',
              'tin' => '222-222-222',
              'vrn' => '345Y-342',
              'regno' => '200000',
              'slogan' => 'For Dynamic World',
              'mission' => 'monthly',
              'vision' => 'monthly',
              'usage_count' => '0',
              'last_renew_date' => now(),
              'trial_expire_date' => now()->addMonth(3), 
              'expire_date' => now()->addMonth(3),  
              'employees' => 9,               
              'trial' => true,  
              'balance' => 200000.00,                         
              'created_at' => now(),
              'updated_at' => now(),
          ]);

          DB::table('companies')->insert([
              'name' => 'BrainySoft',
              'description' => 'BrainySoft Tanzania Limited',
              'country_id' => 1,
              'logo' => 'logo_2.png',
              'district' => 'Ilala',
              'region' => 'Dar es salaam',
              'pobox' => '637',
              'website' => 'www.brainysoft.com',
              'tin' => '111-111-111',
              'vrn' => '345Y-454',
              'regno' => '200222',
              'slogan' => 'Agily World',
              'mission' => 'monthly',
              'vision' => 'monthly',
              'usage_count' => '0',
              'last_renew_date' => now(),
              'trial_expire_date' => now()->addMonth(3), 
              'expire_date' => now()->addMonth(3),  
              'employees' => 9,                
              'trial' => true, 
              'balance' => 200000.00,                                      
              'created_at' =>now(),
              'updated_at' =>now(),
              ]);

    }
}
