<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable =[
        'fist_name',
        'last_name',
        'gender',
        'email',
        'password',
        'phone_number',
        'profile'
    ];
    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    public function Class(){
        return $this->belongsTo(Classes::class);
    }
    public function Batch(){
        return $this->belongsTo(Batch::class);
    }
    public function Admin(){
        return $this->belongsTo(Admin::class);
    }
    public function Request(){
        return $this->hasmany(Request::class);
    }

}

