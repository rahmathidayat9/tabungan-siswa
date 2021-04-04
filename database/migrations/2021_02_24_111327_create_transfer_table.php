<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer', function (Blueprint $table) {
            $table->id('id_transfer');
            $table->string('jns_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->bigInteger('id_transaksi')->nullable();
            $table->string('rek_tujuan')->nullable();
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
        Schema::dropIfExists('transfer');
    }
}
