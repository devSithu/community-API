<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntroducerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introducer', function (Blueprint $table) {
            $table->bigIncrements('introduce_id');
            $table->unsignedBigInteger('user_number');
            $table->integer('introduced_number');
            $table->string('charge_code',50);
            $table->integer('status');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->foreign('user_number')
            ->references('user_number')->on('community_user')
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
        Schema::dropIfExists('introducer');
    }
}
