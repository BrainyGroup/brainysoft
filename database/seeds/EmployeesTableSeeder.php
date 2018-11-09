<?php

use Illuminate\Database\Seeder;
use BrainySoft\User;
use Carbon\Carbon;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('employees')->truncate();

      $user1 = User::find(1);
      $user1_dob = $user1->dob;
      $end_date1 = Carbon::parse($user1->dob)->addYears(60);

      $user2 = User::find(2);
      $user2_dob = $user2->dob;
      $end_date2 = Carbon::parse($user2->dob)->addYears(60);

      $user3 = User::find(3);
      $user3_dob = $user3->dob;
      $end_date3 = Carbon::parse($user3->dob)->addYears(60);

      $user4 = User::find(4);
      $user4_dob = $user4->dob;
      $end_date4 = Carbon::parse($user4->dob)->addYears(60);

      $user5 = User::find(5);
      $user5_dob = $user5->dob;
      $end_date5 = Carbon::parse($user5->dob)->addYears(60);

      $user6 = User::find(6);
      $user6_dob = $user6->dob;
      $end_date6 = Carbon::parse($user6->dob)->addYears(60);

      $user7 = User::find(7);
      $user7_dob = $user7->dob;
      $end_date7 = Carbon::parse($user7->dob)->addYears(60);

      $user8 = User::find(8);
      $user8_dob = $user8->dob;
      $end_date8 = Carbon::parse($user8->dob)->addYears(60);

      $user9 = User::find(9);
      $user9_dob = $user9->dob;
      $end_date9 = Carbon::parse($user9->dob)->addYears(60);



      DB::table('employees')->insert([
              'designation_id' => 1,
              'identity' => '001',
              'user_id' => 1,
              'company_id' => 1,
              'center_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => $end_date1,
              'account_number' => '1111111',
              'bank_id' => 2,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employees')->insert([
              'designation_id' => 2,
              'identity' => '002',
              'user_id' => 2,
              'company_id' => 1,
              'center_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => $end_date2,
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('employees')->insert([
              'designation_id' => 3,
              'identity' => '009',
              'user_id' => 3,
              'company_id' => 1,
              'center_id' => 1, 
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => $end_date3,
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

        DB::table('employees')->insert([
              'designation_id' => 4,
              'identity' => '010',
              'user_id' => 4,
              'company_id' => 1,
              'center_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => $end_date4,
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
              'designation_id' => 9,
              'identity' => '025',
              'user_id' => 5,
              'company_id' => 1,
              'center_id' => 1,
              'department_id' => 1,
              'start_date' => '2011-01-01',
              'end_date' => $end_date5,
              'account_number' => '53379113731',
              'bank_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation_id' => 5,
          'identity' => '031',
          'user_id' => 6,
          'company_id' => 1,
          'center_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => $end_date6,
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation_id' => 6,
          'identity' => '027',
          'user_id' => 7,
          'company_id' => 1,
          'center_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => $end_date7,
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);


        DB::table('employees')->insert([
          'designation_id' => 7,
          'identity' => '030',
          'user_id' => 8,
          'company_id' => 1,
          'center_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => $end_date8,
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);

        DB::table('employees')->insert([
          'designation_id' => 8,
          'identity' => '032',
          'user_id' => 9,
          'company_id' => 1,
          'center_id' => 1,
          'department_id' => 1,
          'start_date' => '2011-01-01',
          'end_date' => $end_date9,
          'account_number' => '53379113731',
          'bank_id' => 1,
          'created_at' =>now(),
          'updated_at' =>now(),
            ]);


    }
}
