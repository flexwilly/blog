<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [ 'id' =>1 ,'name'=>'Juma Anders', 'email' => 'admin@gmail.com','password' => Hash::make('12345678') ],
            [ 'id' =>2 ,'name'=>'Alphonse Kagei','email' => 'subscriber@gmail.com','password' => Hash::make('12345678') ],
            [ 'id' =>3 ,'name'=>'Ivan Telio', 'email' => 'author@gmail.com','password' => Hash::make('12345678') ]
            
        ]);
    }
}
