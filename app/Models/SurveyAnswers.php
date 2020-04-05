<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswers extends Model
{
    protected $table = 'survey_answers';
    protected $fillable = [
        'survey_answer_id','survey_question_id','content','tags','is_other','is_exclusion','created_at','updated_at','created_by','updated_by','deleted_at'
    ];
    protected $primaryKey = 'survey_answer_id';
    public $timestamps = false;
}
