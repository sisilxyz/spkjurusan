<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_jurusans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_kriteria');
            $table->timestamps();
            $table->foreign('id_jurusan')->references('id')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_jurusans');
    }
}
