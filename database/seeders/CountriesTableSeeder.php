<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
              'description' => 'Tanzaia',
              'country_code' => 'TZ',
              'flag' => 'tz',
              'currency_code' => 'TZS',
              'currency_name' => 'Tanzanian shillings',
              'capital' => 'Dodoma',
              'language' => 'Kiswahili',
              'language_code' => 'sw',
              'map' => 'tz',
              'google_cordinate' => '6.3690 S,34.8888 E',
              'company_count' => '0',
              'system_users' => '0',
              'employees' => '0',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('countries')->insert([
              'name' => 'Kenya',
              'description' => 'Kenya',
              'country_code' => 'KE',
              'flag' => 'ke',
              'currency_code' => 'KES',
              'currency_name' => 'Kenyan shillings',
              'capital' => 'Nairobi',
              'language' => 'Kiswahili',
              'language_code' => 'sw',
              'map' => 'ke',
              'google_cordinate' => '00',
              'company_count' => '0',
              'system_users' => '0',
              'employees' => '0',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('countries')->insert([
              'name' => 'Uganda',
              'description' => 'Uganda',
              'country_code' => 'UG',
              'flag' => 'ug',
              'currency_code' => 'UGS',
              'currency_name' => 'Ugandan shillings',
              'capital' => 'Kampala',
              'language' => 'Baganda',
              'language_code' => 'bg',
              'map' => 'tz',
              'google_cordinate' => '0',
              'company_count' => '0',
              'system_users' => '0',
              'employees' => '00',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('countries')->insert([
              'name' => 'Rwanda',
              'description' => 'Rwanda',
              'country_code' => 'RW',
              'flag' => 'rw',
              'currency_code' => 'RWF',
              'currency_name' => 'Rwandan franc',
              'capital' => 'Kigali',
              'language' => 'Nyarwanda',
              'language_code' => 'rw',
              'map' => 'rw',
              'google_cordinate' => '0',
              'company_count' => '0',
              'system_users' => '0',
              'employees' => '0',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('countries')->insert([
              'name' => 'Burundi',
              'description' => 'Burundi',
              'country_code' => 'BI',
              'flag' => 'bi',
              'currency_code' => 'BIF',
              'currency_name' => 'Burundian franc',
              'capital' => 'Bujumbura',
              'language' => 'Kirundi',
              'language_code' => 'bi',
              'map' => 'bi',
              'google_cordinate' => '0',
              'company_count' => '0',
              'system_users' => '0',
              'employees' => '0',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('countries')->insert([
              'name' => 'South Sudan',
              'description' => 'South Sudan',
              'country_code' => 'TZ',
              'flag' => 'tz',
              'currency_code' => 'TZS',
              'currency_name' => 'Tanzania shillings',
              'capital' => 'Dodoma',
              'language' => 'Kiswahili',
              'language_code' => 'sw',
              'map' => 'tz',
              'google_cordinate' => '00',
              'company_count' => '0',
              'system_users' => '0',
              'employees' => '0',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
