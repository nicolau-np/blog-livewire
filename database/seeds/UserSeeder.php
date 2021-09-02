<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{


    public function run()
    {
        DB::table('users')->insert(
            array(
                [
                    'name'=>"Mark Marques",
                    'email'=>"nic340k@gmail.com",
                    'password'=>Hash::make('olaola'),
                    'acesso'=>"admin",
                    'estado'=>"on",
                ], [
                    'name'=>"Post Malonne",
                    'email'=>"post@gmail.com",
                    'password'=>Hash::make('babaca'),
                    'acesso'=>"user",
                    'estado'=>"on",
                ],

            )
        );
    }
}
