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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->date('tanggal_boking');
            $table->string('jenis_service');
            $table->integer('jumlah');
            $table->unsignedbigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('CASCADE');
            $table->unsignedbigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('CASCADE');
            $table->unsignedbigInteger('id_mekanik');
            $table->foreign('id_mekanik')->references('id')->on('mekaniks')->onDelete('CASCADE');
            $table->unsignedbigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('CASCADE');
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
        Schema::dropIfExists('services');
    }
};