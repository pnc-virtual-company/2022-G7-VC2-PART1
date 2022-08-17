<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable =[
        'Generation'
    ];
    public function Student(){
        return $this->hasmany(Student::class);
    }
}
