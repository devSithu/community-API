<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionBranchConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_question_branch_conditions', function (Blueprint $table) {
            $table->bigIncrements('survey_question_branch_condition_id');
            $table->unsignedBigInteger('survey_question_id');
            $table->integer('branch_question_id');
            $table->integer('branch_answer_id');
            $table->timestamp('created_at');
            $table->integer('created_by');
            $table->timestamp('updated_at');
            $table->integer('updated_by');
            $table->timestamp('deleted_at');

            $table->foreign('survey_question_id')
            ->references('survey_question_id')->on('survey_questions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_question_branch_conditions');
    }
}
