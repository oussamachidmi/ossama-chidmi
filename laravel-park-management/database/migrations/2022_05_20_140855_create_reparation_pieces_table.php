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
        Schema::create('reparation_piece', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reparation_id');
            $table->unsignedBigInteger('piece_id');
            $table->foreign('reparation_id')->references('id')->on('reparations');
            $table->foreign('piece_id')->references('id')->on('pieces');
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
        Schema::dropIfExists('reparation_pieces');
    }
};