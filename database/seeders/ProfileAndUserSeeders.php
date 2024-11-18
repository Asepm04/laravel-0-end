<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class ProfileAndUserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $request = 
        // [
        //     "name"=>"yadi",
        //     "email"=>"yadi111@com",
        //     "password"=>bcrypt("Yadi123..")
        // ];
        // $user = User::create($request);
        // $profile = new Profile(["job"=>"magang"]);
        // $user->profile()->save($profile);

        $user = User::Find(9);
        $user->profile()->update(["job"=>"buruh"]);
    }
}
