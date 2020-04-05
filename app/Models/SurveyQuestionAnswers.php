<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionAnswers extends Model
{
    protected $table = 'survey_question_answers';
    protected $fillable = [
        'survey_question_answer_id','user_number','survey_id','content_1',
        'content_2','content_3','content_4','content_5','content_6','content_7',
        'content_8','content_9','content_10','content_11',
        'content_12','content_13','content_14','content_15','content_16','content_17',
        'content_18','content_19','content_20','content_21',
        'content_22','content_23','content_24','content_25','content_26','content_27',
        'content_28','content_29','content_30','content_31',
        'content_32','content_33','content_34','content_35','content_36','content_37',
        'content_38','content_39','content_40','content_41',
        'content_42','content_43','content_44','content_45','content_46','content_47',
        'content_48','content_49','content_50','created_at','updated_at','created_by','updated_by','deleted_at'
    ];
    protected $primaryKey = 'survey_question_answer_id';
    public $timestamps = false;
}
