<?php

namespace App\Models;

use App\Models\Introducer;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //enable hasApiToken and notifiable
    use Notifiable, HasApiTokens;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'community_user';
    protected $fillable = [
        'user_number', 'login_id', 'password', 'user_type', 'user_name', 'gender', 'date_of_birth',
        'nrc_number', 'graduated_from', 'graduated_dep', 'graduated_year', 'region', 'address', 'phone_number',
        'career','status','answer_four',
        'email','connect_sns','operator_type','nrc_image', 'answer_one', 'answer_two', 'answer_three', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'user_number';
    public $timestamps = false;

 

}
