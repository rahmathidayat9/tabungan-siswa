<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pegawai')->nullable();
            $table->string('nm_pegawai')->nullable();
            $table->enum('jk',['L','P'])->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('id_users')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
}
