<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_master', function (Blueprint $table) {
            $table->bigIncrements('point_id');
            $table->string('action',100);
            $table->integer('point');
            $table->timestamp('start_at');
            $table->timestamp('expiration_at');
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_master');
    }
}
