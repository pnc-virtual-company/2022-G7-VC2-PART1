<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'first_name',
        'last_name',
        'profile',
        'email',
        'password'
    ];
    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    public function Student(){
        return $this->hasmany(Student::class);
    }
}
