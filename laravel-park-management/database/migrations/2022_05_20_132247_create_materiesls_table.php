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
        Schema::create('materiels1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modele_id');
            $table->unsignedBigInteger('poste_id');
            $table->unsignedBigInteger('contrat_id');
            $table->foreign('modele_id')->references('id')->on('modeles');
            $table->foreign('poste_id')->references('id')->on('postes');
            $table->foreign('contrat_id')->references('id')->on('contrats');
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
        Schema::dropIfExists('materiels');
    }
};