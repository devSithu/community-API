<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'surveys';
    protected $fillable = [
       'survey_id','name','point','description','start_datetime','end_datetime','start_screen_message','finish_screen_message','limit_flg','created_at','updated_at','created_by','updated_by','deleted_at'
    ];
    protected $primaryKey = 'survey_id';
    public $timestamps = false;
}
