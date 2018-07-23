<?php

use Illuminate\Database\Seeder;

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
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Gross',
              'description' => 'Gross Salary',
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Taxable',
              'description' => 'Taxable Salary',
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Net bofore',
              'description' => 'Net before deduction',
          ]);

      DB::table('salary_bases')->insert([
              'name' => 'Net',
              'description' => 'Net take home',
          ]);
    }
}
