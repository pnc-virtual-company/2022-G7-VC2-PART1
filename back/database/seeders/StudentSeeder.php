<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students=[
            [
            'first_name'=>"Cham",'last_name'=>"smey",
            'gender'=>'Male','email'=>'smey@gmail.com','password'=>Hash::make("cham23145677"),'profile'=>'require(../public/images/Student/student.jpg)',
            'phone_number'=>9634521,'class_id'=>1, 'batch_id'=>1, 'admin_id'=>1,
            'role'=>'student',
        ],
        ];
        foreach($students as $student){
            Student::create($student);
        }
    }
}