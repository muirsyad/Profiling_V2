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
        Schema::create('templates_report', function (Blueprint $table) {
            $table->id();
            $table->string('Behaviour_type');
            $table->string('keywords');
            $table->string('weakness');
            $table->string('motivation');
            $table->string('fear');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_templates_report');
    }
};
