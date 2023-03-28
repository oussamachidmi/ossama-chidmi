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
        Schema::create('pannes1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materiel_id');
            $table->foreign('materiel_id')->references('id')->on('materiels'); 
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users');
            $table->string('description');
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
        Schema::table('pannes', function (Blueprint $table) {
            //
        });
    }
};  