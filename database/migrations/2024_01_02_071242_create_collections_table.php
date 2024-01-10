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
        Schema::create('collections', function (Blueprint $table)
        {
            $table->id();
            $table->string('shortname', 50);
            $table->string('fullname', 255);
            $table->string('slug', 191)->unique();
            $table->foreignId('image_id')->nullable()->constrainted()->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreignId('user_id')->constrainted()->onDelete('cascade');
            $table->integer('year');
            $table->text('description');
            $table->string('link')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
