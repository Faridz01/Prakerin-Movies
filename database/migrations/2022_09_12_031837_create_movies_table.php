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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('judul_film');
            $table->text('sinopsis');
            $table->string('background');
            $table->string('cover');
            $table->integer('durasi');
            $table->unsignedBigInteger('id_tahun_rilis');
            $table->unsignedBigInteger('id_genre');
            //foregin key
            $table->foreign('id_tahun_rilis')->references('id')->on('tahun_rilis')
            ->onDelete('cascade');
            $table->foreign('id_genre')->references('id')->on('genre_films')
            ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('casting_movies', function (Blueprint $table) {
            $table->id();
            //isi skemanya...
            $table->unsignedBigInteger('id_casting');
            $table->unsignedBigInteger('id_movie');
            //fk
            $table->foreign('id_casting')->references('id')->on('castings')
            ->onDelete('cascade');
            $table->foreign('id_movie')->references('id')->on('movies')
            ->onDelete('cascade');
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
        Schema::dropIfExists('casting_movies');
        Schema::dropIfExists('movies');
    }
};
