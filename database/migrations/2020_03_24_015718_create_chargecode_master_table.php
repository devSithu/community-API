<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargecodeMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargecode_master', function (Blueprint $table) {
            $table->bigIncrements('chargecode_id');
            $table->string('career',50);
            $table->string('chaegecode',100);
            $table->integer('status');
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
        Schema::dropIfExists('chargecode_master');
    }
}
