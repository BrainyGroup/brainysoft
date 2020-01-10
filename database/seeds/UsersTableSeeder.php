<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();

      DB::table('users')->insert([
              'name' => 'Godfrey Woiso',
              'title' => 'Mr',
              'firstname' => 'Godfrey',
              'middlename' => 'Richard',
              'lastname' => 'Woiso',
              'dob' => '1974-02-02',
              'company_id' => 1,
              'photo' => '1.png',
              'email' => 'godfrey.woiso@datahousetza.com',
              'sex' => 'Male',
              'mobile' => '+255754744254',
              'maritalstatus' => 1,
              'employee' => true,
              'password' => bcrypt('123456'),
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('users')->insert([
              'name' => 'Yahaya Frezier',
              'title' => 'Mr',
              'firstname' => 'Yahaya',
              'middlename' => 'Athumani',
              'lastname' => 'Frezier',
              'dob' => '1975-06-15',
              'company_id' => 1,
              'photo' => '2.png',
              'email' => 'yahaya.frezier@datahousetza.com',
              'sex' => 'Male',
              'mobile' => '+255754307151',
              'maritalstatus' => 1,
              'employee' => true,
              'password' => bcrypt('123456'),
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('users')->insert([
              'name' => 'Seif Maulid',
              'title' => 'Mr',
              'firstname' => 'Seif',
              'middlename' => '',
              'lastname' => 'Maulid',
              'dob' => '1980-07-20',
              'company_id' => 1,
              'photo' => '3.png',
              'email' => 'seif.maulid@datahousetza.com',
              'sex' => 'Male',
              'mobile' => '+255712916916',
              'maritalstatus' => 1,
              'employee' => true,
              'password' => bcrypt('123456'),
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

        DB::table('users')->insert([
                'name' => 'Silvano Machangu',
                'title' => 'Mr',
                'firstname' => 'Silvano',
                'middlename' => '',
                'lastname' => 'Machangu',
                'dob' => '1990-10-05',
                'company_id' => 1,
                'photo' => '4.png',
                'email' => 'silvano.machangu@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255713680495',
                'maritalstatus' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);

        DB::table('users')->insert([
                'name' => 'Aron James',
                'title' => 'Mr',
                'firstname' => 'Aron',
                'middlename' => '',
                'lastname' => 'James',
                'dob' => '1979-02-02',
                'company_id' => 1,
                'photo' => '5.png',
                'email' => 'aron.james@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255788591751',
                'maritalstatus' => 1,
                'employee' => true,
                'password' => bcrypt('123456'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);



        DB::table('users')->insert([
                'name' => 'Rahim Kanjara',
                'title' => 'Mr',
                'firstname' => 'Rahim',
                'middlename' => '',
                'lastname' => 'Kanjara',
                'dob' => '1990-10-05',
                'company_id' => 1,
                'photo' => '6.png',
                'email' => 'rahim.kanjara@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255716150594',
                'maritalstatus' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);


        DB::table('users')->insert([
                'name' => 'Jeremia Malamka',
                'title' => 'Mr',
                'firstname' => 'Jeremia',
                'middlename' => '',
                'lastname' => 'Malamka',
                'dob' => '1979-02-02',
                'company_id' => 1,
                'photo' => '7.png',
                'email' => 'jeremia.malamka@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255656745777',
                'maritalstatus' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);

        DB::table('users')->insert([
                'name' => 'Alex Makolo',
                'title' => 'Mr',
                'firstname' => 'Alex',
                'middlename' => '',
                'lastname' => 'Makolo',
                'dob' => '1989-07-20',
                'company_id' => 1,
                'photo' => '8.png',
                'email' => 'alex.makolo@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255683358990',
                'maritalstatus' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);



        DB::table('users')->insert([
                'name' => 'Martha Paul',
                'title' => 'Ms',
                'firstname' => 'Martha',
                'middlename' => '',
                'lastname' => 'Paul',
                'dob' => '1990-10-05',
                'company_id' => 1,
                'photo' => '9.png',
                'email' => 'martha.paul@datahousetza.com',
                'sex' => 'Female',
                'mobile' => '+255753956864',
                'maritalstatus' => 1,
                'employee' => false,
                'password' => bcrypt('123456'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);

            DB::table('users')->insert([
                    'name' => 'John Doe',
                    'title' => 'Mr',
                    'firstname' => 'John',
                    'middlename' => 'Jerry',
                    'lastname' => 'Doe',
                    'dob' => '1979-02-02',
                    'company_id' => 1,
                    'photo' => '1.png',
                    'email' => 'john.doe@datahousetza.com',
                    'sex' => 'Male',
                    'mobile' => '+255754307153',
                    'maritalstatus' => 0,
                    'employee' => false,
                    'password' => bcrypt('123456'),
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]);


                DB::table('users')->insert([
                        'name' => 'Yahaya Frezier',
                        'title' => 'Mr',
                        'firstname' => 'Yahaya',
                        'middlename' => 'Beatus',
                        'lastname' => 'Frezier',
                        'dob' => '1989-07-20',
                        'company_id' => 1,
                        'photo' => '2312.png',
                        'email' => 'yahaya.frezier1@datahousetza.com',
                        'sex' => 'Male',
                        'mobile' => '+2557543071222',
                        'maritalstatus' => 1,
                        'employee' => true,
                        'password' => bcrypt('123456'),
                        'created_at' =>now(),
                        'updated_at' =>now(),
                    ]);

                    DB::table('users')->insert([
                            'name' => 'Felista Mushi',
                            'title' => 'Mrs',
                            'firstname' => 'Felista',
                            'middlename' => 'Andrew',
                            'lastname' => 'Mushi',
                            'dob' => '1990-10-05',
                            'company_id' => 2,
                            'photo' => '333.png',
                            'email' => 'felista.mushi@datahousetza.com',
                            'sex' => 'Female',
                            'mobile' => '+255754307152',
                            'maritalstatus' => 1,
                            'employee' => false,
                            'password' => bcrypt('123456'),
                            'created_at' =>now(),
                            'updated_at' =>now(),
                        ]);


    }
}
