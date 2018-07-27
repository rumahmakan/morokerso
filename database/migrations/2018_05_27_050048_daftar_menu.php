<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DaftarMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_menu');
            $table->integer('harga');
            $table->integer('pesan');
            $table->string('gambar_menu');
            $table->string('deskripsi_menu');
            $table->integer('jenis');
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
      Schema::dropIfExists('menu');
    }
}
