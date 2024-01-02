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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('shortname', 50);
            $table->string('fullname', 255);
            $table->string('image', 255)->nullable();
            $table->string('firstgender');
            $table->string('secondgender')->nullable();
            $table->string('thirdgender')->nullable();
            $table->integer('year');
            $table->text('description');
            $table->string('link');
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
        Schema::dropIfExists('collections');
    }
};
