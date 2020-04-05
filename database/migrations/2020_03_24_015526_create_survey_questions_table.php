<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->bigIncrements('survey_question_id');
            $table->unsignedBigInteger('survey_id');
            $table->integer('data_type_id');
            $table->text('content');
            $table->integer('order');
            $table->integer('page');
            $table->integer('validation_type');
            $table->integer('limit_words');
            $table->boolean('required_flg');
            $table->timestamp('created_at');
            $table->integer('created_by');
            $table->timestamp('updated_at');
            $table->integer('updated_by');
            $table->timestamp('deleted_at');

            $table->foreign('survey_id')
            ->references('survey_id')->on('surveys')
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
        Schema::dropIfExists('survey_questions');
    }
}
