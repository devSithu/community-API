<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestions extends Model
{
    protected $table = 'survey_questions';
    protected $fillable = [
      'survey_question_id','survey_id','date_type_id','content','order','page','validation_type','limit_words','required_flg','created_at','updated_at','created_by','updated_by','deleted_at' 
    ];
    protected $primaryKey = 'survey_question_id';
    public $timestamps = false;
}
