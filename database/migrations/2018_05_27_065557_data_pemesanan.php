<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemesan');
            $table->string('alamat');
            $table->unsignedInteger('menu_id');
            $table->string('tanggal');
            $table->string('pukul');
            $table->string('no_hp');
            $table->integer('jmlh_pesanan');
            $table->string('keterangan_pesanan');
            $table->timestamps();
      });
      Schema::table('pemesanan', function(Blueprint $kolom){
            $kolom->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('pemesanan');
    }
}
