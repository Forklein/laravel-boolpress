<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $new_user = new User();
        $new_user->name = 'Forklein';
        $new_user->email = 'giuseppepisani2@gmail.com';
        $new_user->password = bcrypt('password');
        $new_user->save();

        for ($i = 0; $i < 15; $i++) {
            $new_user = new User();
            $new_user->name = $faker->userName();
            $new_user->email = $faker->email();
            $new_user->password = bcrypt($faker->word());
            $new_user->save();
        }
    }
}
