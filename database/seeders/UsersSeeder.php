<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<1000; $i++){
            $faker = Factory::create();
            $user=new \App\Models\User;
            $user->user_id=$i+1;
            $user->first_name=$faker->firstName();
            $user->last_name=$faker->lastName;
            $user->full_name=$user->first_name.' '.$user->last_name;
            $user->gender= rand(0, 1)?'male':'female';
            $user->number_of_message= rand(5, 200);
            $user->age=rand(1,30);
            $user->creation_date=$faker->date();
            $user->save();
        }
    }
}
