<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    protected $table = 'register_users';
    protected $fillable = [
        'user_id','name','email','password'
    ];
    protected $primaryKey = 'user_id';
    public $timestamps = false;
}
