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
        Schema::create('log_pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengeluaran_id')->unsigned();
            $table->string('type');
            $table->string('activities');
            $table->timestamps();

            $table->foreign('pengeluaran_id')->references('id')->on('pengeluaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pengeluaran');
    }
};
