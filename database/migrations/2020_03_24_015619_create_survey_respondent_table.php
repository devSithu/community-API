<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyRespondentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_respondent', function (Blueprint $table) {
            $table->bigIncrements('respondent_id');
            $table->unsignedBigInteger('survey_id');
            $table->integer('user_number');
            $table->integer('status');
            $table->timestamp('answered_at');
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
        Schema::dropIfExists('survey_respondent');
    }
}
