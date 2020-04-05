<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionBranchConditions extends Model
{
    protected $table = 'survey_question_branch_conditions';
    protected $fillable = [
        'survey_question_branch_condition_id','survey_question_id','branch_question_id',
        'branch_answer_id','created_at','created_by','updated_at','updated_by','deleted_at'
    ];
    protected $primaryKey = 'survey_question_branch_condition_id';
    public $timestamps = false;
}
