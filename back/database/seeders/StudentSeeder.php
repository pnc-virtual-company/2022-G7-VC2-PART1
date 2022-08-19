<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

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
            'First_name'=>"Cham",'Last_name'=>"smey",
            'Gender'=>'Male','Email'=>'smey@gmail','Password'=>"cham23145677",
            'Phone_number'=>9634521,'class_id'=>1, 'batch_id'=>1, 'admin_id'=>1
        ],
        ];
        foreach($students as $student){

            Student::create($student);
        }
    }
}
