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
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_panne');
            $table->unsignedBigInteger('id_technicien');
            $table->date('date_reparation');
            $table->string('descreption');
            $table->foreign('id_panne')->references('id')->on('pannes');
            $table->foreign('id_technicien')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparations');
    }
};