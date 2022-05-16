<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_datauser');
            $table->string('nilaisiswa');
            $table->unsignedBigInteger('id_kriteria');
            $table->timestamps();
            $table->foreign('id_datauser')->references('id')->on('datausers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('nilai_users');
    }
}
