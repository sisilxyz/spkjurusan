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
            $table->string('nama');
            $table->integer('nisn');
            $table->integer('matematika');
            $table->integer('ipa');
            $table->integer('ips');
            $table->integer('bing');
            $table->integer('bindo');
            $table->integer('tik');
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
        Schema::dropIfExists('nilai_users');
    }
}
