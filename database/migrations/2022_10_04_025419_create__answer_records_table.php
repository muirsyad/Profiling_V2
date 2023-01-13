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
        Schema::create('answer_records', function (Blueprint $table) {
            $table->id();
            $table->string('answer_records');
            $table->date('created_at');
            $table->unsignedBigInteger('user_id');
            $table->integer('D');
            $table->integer('I');
            $table->integer('S');
            $table->integer('C');

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_answer_records');
    }
};
