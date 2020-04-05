<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_question_answers', function (Blueprint $table) {
            $table->bigIncrements('survey_question_answer_id');
            $table->integer('user_number');
            $table->unsignedBigInteger('survey_id');
            $table->text('content_1');
            $table->text('content_2');
            $table->text('content_3');
            $table->text('content_4');
            $table->text('content_5');
            $table->text('content_6');
            $table->text('content_7');
            $table->text('content_8');
            $table->text('content_9');
            $table->text('content_10');
            $table->text('content_11');
            $table->text('content_12');
            $table->text('content_13');
            $table->text('content_14');
            $table->text('content_15');
            $table->text('content_16');
            $table->text('content_17');
            $table->text('content_18');
            $table->text('content_19');
            $table->text('content_20');
            $table->text('content_21');
            $table->text('content_22');
            $table->text('content_23');
            $table->text('content_24');
            $table->text('content_25');
            $table->text('content_26');
            $table->text('content_27');
            $table->text('content_28');
            $table->text('content_29');
            $table->text('content_30');
            $table->text('content_31');
            $table->text('content_32');
            $table->text('content_33');
            $table->text('content_34');
            $table->text('content_35');
            $table->text('content_36');
            $table->text('content_37');
            $table->text('content_38');
            $table->text('content_39');
            $table->text('content_40');
            $table->text('content_41');
            $table->text('content_42');
            $table->text('content_43');
            $table->text('content_44');
            $table->text('content_45');
            $table->text('content_46');
            $table->text('content_47');
            $table->text('content_48');
            $table->text('content_49');
            $table->text('content_50');
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
        Schema::dropIfExists('survey_question_answers');
    }
}
