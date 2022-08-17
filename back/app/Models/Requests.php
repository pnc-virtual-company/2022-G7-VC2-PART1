<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Requests extends Model
{
    use HasFactory;
    protected $fillable =[
        'Start_date',
        'End_date',
        'Leave_Type',
        'Status',
    ];

    public function Student(){
        return $this->belongsTo(Student::class);
    } 
}
