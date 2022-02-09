<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
            */
        public function run()
            {
            $permissions = [
                //Role
                'role-list',
                'role-create',
                'role-edit',
                'role-delete',

                //Product
                'product-list',
                'product-create',
                'product-edit',
                'product-delete',

                //Allowance
                'allowance-list',
                'allowance-create',
                'allowance-edit',
                'allowance-delete',

                //Allowance type
                'allowance_type-list',
                'allowance_type-create',
                'allowance_type-edit',
                'allowance_type-delete',

                //Basic settings
                'basic_setting-list',
                'basic_setting-create',
                'basic_setting-edit',
                'basic_setting-delete',
                
                //Bank
                'bank-list',
                'bank-create',
                'bank-edit',
                'bank-delete',

                //Center
                'center-list',
                'center-create',
                'center-edit',
                'center-delete',

                //Company
                'company-list',
                'company-create',
                'company-edit',
                'company-delete',

                //Country
                'country-list',
                'country-create',
                'country-edit',
                'country-delete',

                //Deduction
                'deduction-list',
                'deduction-create',
                'deduction-edit',
                'deduction-delete',

                //Deduction type
                'deduction_type-list',
                'deduction_type-create',
                'deduction_type-edit',
                'deduction_type-delete',

                //Department
                'department-list',
                'department-create',
                'department-edit',
                'department-delete',

                //Designation
                'designation-list',
                'designation-create',
                'designation-edit',
                'designation-delete',

                //Documentation
                'documentation-list',
                'documentation-create',
                'documentation-edit',
                'documentation-delete',

                //Employee payment history
                // 'product-list',
                // 'product-create',
                // 'product-edit',
                // 'product-delete',

                //Employee payment
                'employee_payment-list',
                'employee_payment-create',
                'employee_payment-edit',
                'employee_payment-delete',

                //Employee Statutory
                'employee_statutory-list',
                'employee_statutory-create',
                'employee_statutory-edit',
                'employee_statutory-delete',

                //Employee
                'employee-list',
                'employee-create',
                'employee-edit',
                'employee-delete',

                //Employee type
                'employee_type-list',
                'employee_type-create',
                'employee_type-edit',
                'employee_type-delete',

                //Kin
                'kin-list',
                'kin-create',
                'kin-edit',
                'kin-delete',

                //Kin type
                'kin_type-list',
                'kin_type-create',
                'kin_type-edit',
                'kin_type-delete',

                //Level
                'level-list',
                'level-create',
                'level-edit',
                'level-delete',

                //Organization
                'organization-list',
                'organization-create',
                'organization-edit',
                'organization-delete',

                //Pay allowance
                'pay_allowance-list',
                'pay_allowance-create',
                'pay_allowance-edit',
                'pay_allowance-delete',

                //Pay base
                'pay_base-list',
                'pay_base-create',
                'pay_base-edit',
                'pay_base-delete',

                //Pay deduction
                'pay_deduction-list',
                'pay_deduction-create',
                'pay_deduction-edit',
                'pay_deduction-delete',

                //Pay statutory
                'pay_statutory-list',
                'pay_statutory-create',
                'pay_statutory-edit',
                'pay_statutory-delete',

                //Paye
                'paye-list',
                'paye-create',
                'paye-edit',
                'paye-delete',

                
                //Payment
                'payment-list',
                'payment-create',
                'payment-edit',
                'payment-delete',

                //Payroll group
                'payroll_group-list',
                'payroll_group-create',
                'payroll_group-edit',
                'payroll_group-delete',

                //Pay
                'pay-list',
                'pay-create',
                'pay-edit',
                'pay-delete',

                //Salary
                'salary-list',
                'salary-create',
                'salary-edit',
                'salary-delete',

                //Salary Base
                'salary_base-list',
                'salary_base-create',
                'salary_base-edit',
                'salary_base-delete',

                //Scale
                'scale-list',
                'scale-create',
                'scale-edit',
                'scale-delete',

                //Setting
                'setting-list',
                'setting-create',
                'setting-edit',
                'setting-delete',

                //Statutory
                'statutory-list',
                'statutory-create',
                'statutory-edit',
                'statutory-delete',
                
                //Statutory payment history
                'statutory_payment_history-list',
                'statutory_payment_history-create',
                'statutory_payment_history-edit',
                'statutory_payment_history-delete',

                //Statutory payment
                'statutory_payment-list',
                'statutory_payment-create',
                'statutory_payment-edit',
                'statutory_payment-delete',

                //Statutory type
                'statutory_type-list',
                'statutory_type-create',
                'statutory_type-edit',
                'statutory_type-delete',

                //User
                'user-list',
                'user-create',
                'user-edit',
                'user-delete',
                
                ];


                foreach ($permissions as $permission) {
                    Permission::create(['name' => $permission]);
                }
            }
        }
