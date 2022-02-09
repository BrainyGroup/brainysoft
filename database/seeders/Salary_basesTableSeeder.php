<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Salary_basesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('salary_bases')->truncate();

      DB::table('salary_bases')->insert([
              'name' => 'Basic',
              'description' => 'Basic salary',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Gross',
              'description' => 'Gross Salary',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Taxable',
              'description' => 'Taxable Salary',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Net bofore',
              'description' => 'Net before deduction',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Net',
              'description' => 'Net take home',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    }
}
