<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'First_name',
        'Last_name',
        'Profile',
        'Email',
        'Password'
    ];
    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    public function Student(){
        return $this->hasmany(Student::class);
    }
}
