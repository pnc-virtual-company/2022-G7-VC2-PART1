<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Classes extends Model
{
    use HasFactory;
    protected $fillable =[   
        'Class',
    ];
    public function Student(){
        return $this->hasmany(Student::class);
    }
}