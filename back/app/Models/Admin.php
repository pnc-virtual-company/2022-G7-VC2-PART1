<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable =[
        'first_name',
        'last_name',
        'profile',
        'email',
        'password',
        'role'
    ];
    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    public function Student(){
        return $this->hasmany(Student::class);
    }
}
