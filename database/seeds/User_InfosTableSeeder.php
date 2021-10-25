<?php

use Illuminate\Database\Seeder;
use App\UserInfo;
use Faker\Generator as Faker;

class User_InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 16; $i++) {
            $new_UserInfo = new UserInfo();
            $new_UserInfo->user_id = $i + 1;
            $new_UserInfo->address = 'Via del test';
            $new_UserInfo->phone = $faker->phoneNumber();
            $new_UserInfo->country = 'USA';
            $new_UserInfo->save();
        }
    }
}
