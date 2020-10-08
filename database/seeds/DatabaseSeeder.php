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
    protected $settings = [
      [
          'key'                       =>  'site_name',
          'value'                     =>  'BrainySoft',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'site_title',
          'value'                     =>  'BrainySoft',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'default_email_address',
          'value'                     =>  'yahaya.frezier@datahousetza.com',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'currency_code',
          'value'                     =>  'TZS',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'currency_symbol',
          'value'                     =>  'Tsh',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'site_logo',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'site_favicon',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'footer_copyright_text',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'seo_meta_title',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'seo_meta_description',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'social_facebook',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'social_twitter',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'social_instagram',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'social_linkedin',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'google_analytics',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'facebook_pixels',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'stripe_payment_method',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'stripe_key',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'stripe_secret_key',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'paypal_payment_method',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'paypal_client_id',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
      [
          'key'                       =>  'paypal_secret_id',
          'value'                     =>  '',
          'company_id'                =>   1,
          'description'               =>  '',
      ],
  ];
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
