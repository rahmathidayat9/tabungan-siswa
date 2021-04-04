<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('kd_nasabah')->nullable();
            $table->string('nm_nasabah')->nullable();
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
        Schema::dropIfExists('nasabah');
    }
}
