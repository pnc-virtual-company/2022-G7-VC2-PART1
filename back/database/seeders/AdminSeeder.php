<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins =[
            [
                'first_name'=>"Sim",'last_name'=>"Houl",
                'email'=>'admin@gmail.com','password'=>Hash::make("1234"),
                'profile'=>'photo_2021-02-05_05-32-47.jpg',
                'role'=>'admin'
            ]
        ];
        foreach($admins as $admin){
            Admin::create($admin);
        }
    }
}