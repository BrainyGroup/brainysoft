<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
           //LevelsTableSeeder::class,
           //DesignationsTableSeeder::class,
           Employee_statutoriesTableSeeder::class,
           PaysTableSeeder::class,
           Pay_statutoriesTableSeeder::class,
           DepartmentTableSeeder::class,
           Payroll_groupTableSeeder::class,
           Kin_typeTableSeeder::class,
           Employment_typeTableSeeder::class,
           Pay_baseTableSeeder::class,
           BasicSettingsTableSeeder::class,
           RolesTableSeeder::class,
           PermissionTableSeeder::class,

         ]);
    }
}
