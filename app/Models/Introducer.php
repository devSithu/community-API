<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Introducer extends Model
{
    protected $table = 'introducer';
    protected $fillable = [
        'introduce_id','user_number','introduced_number','charge_code','status'
    ];
    protected $primaryKey = 'introduce_id';
    public $timestamps = false;

    public function community()
    {
        return $this->belongsTo(User::class);
    }
}
