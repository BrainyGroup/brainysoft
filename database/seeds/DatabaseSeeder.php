<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
           UsersTableSeeder::class,
           CountriesTableSeeder::class,
           Salary_basesTableSeeder::class,
           PayesTableSeeder::class,
           Statutory_typesTableSeeder::class,
           OrganizationsTableSeeder::class,
           StatutoriesTableSeeder::class,
           BanksTableSeeder::class,
           CentersTableSeeder::class,
           EmployeesTableSeeder::class,
           ScalesTableSeeder::class,
           SalariesTableSeeder::class,
           CompaniesTableSeeder::class,
           Deduction_typesTableSeeder::class,
           Allowance_typesTableSeeder::class,
           DeductionsTableSeeder::class,
           AllowancesTableSeeder::class,
           LevelsTableSeeder::class,
           DesignationsTableSeeder::class,
           Employee_statutoryTableSeeder::class,
         ]);
    }
}
