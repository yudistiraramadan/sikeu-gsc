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
        Schema::create('donatur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('job');
            $table->string('photo')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->enum('type', ['premium', 'reguler']);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donatur');
    }
};
