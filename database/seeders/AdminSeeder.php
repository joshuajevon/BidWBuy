<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'test',
            'email'=> 'test@example.com',
            'password' =>bcrypt('test1234'),
            'phoneNumber' => '+6281234567890',
            'dob' => '2000-02-24',
            'gender'=> 'male',
            'address' => 'jl.kemanggisan',
            'isAdmin'=> true,
        ]);
    }
}
