<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'Fist_name',
        'Last_name',
        'Gender',
        'Email',
        'Password',
        'Phone_number',
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

