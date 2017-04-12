<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {

                DB::table('users')->insert([
                'username' => $faker->firstName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'password' => bcrypt(str_random(10)),
                'activated' => rand(0,1),
                ]);
        }

        $this->command->info('Menambahkan 10 User ke Table Users');
    }
}
