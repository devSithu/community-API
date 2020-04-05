<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyRespondent extends Model
{
    protected $table = 'survey_respondent';
    protected $fillable = [
        'respondent_id','survey_id','user_number','status','answered_at',
        'created_at','created_by','updated_at','updated_by','deleted_at'
    ];
    protected $primaryKey = 'respondent_id';
    public $timestamps = false;
}
