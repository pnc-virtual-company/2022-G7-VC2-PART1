<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

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
                'email'=>'sim@gmail','password'=>"sim23145677",
                'profile'=>'photo_2021-02-05_05-32-47.jpg',
            ]
        ];
        foreach($admins as $admin){
            Admin::create($admin);
        }
    }
}