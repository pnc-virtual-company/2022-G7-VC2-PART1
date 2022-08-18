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
        'leave_Type',
        'Status',
        'Reason',
        'Duration',
        'student_id'
    ];

    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    
    public function Student(){
        return $this->belongsTo(Student::class);
    } 
}
