<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pemasukans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pemasukan_id')->unsigned();
            $table->string('type');
            $table->string('activities');
            $table->timestamps();

            $table->foreign('pemasukan_id')->references('id')->on('pemasukan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pemasukans');
    }
};
