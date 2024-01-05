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
        Schema::create('genre_collection', function (Blueprint $table)
        {
            $table->id();
            $table->integer('id_genre');
            $table->integer('id_collection');
            $table->timestamps();

            $table->foreign('id_genre')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('id_collection')->references('id')->on('collections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_collection');
    }
};
