<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTypes extends Model
{
    protected $table = 'data_types';
    protected $fillable = [
        'data_type_id','name','input_type','is_freeanswer','order','is_view',
        'created_at','created_by','updated_at','updated_by','deleted_at'    
    ];
    protected $primaryKey = 'data_type_id';
    public $timestamps = false;
}
