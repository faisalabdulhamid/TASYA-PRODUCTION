<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableDetailPesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            // $table->increments('id');
            $table->unsignedInteger('jumlah');//QTY
            $table->unsignedInteger('sub_total');
            // $table->timestamps();

            $table->unsignedInteger('pesanan_id');
            $table->unsignedInteger('produk_id');

            $table->foreign('pesanan_id')
                ->references('id')
                ->on('pesanan')
                ->onDelete('cascade');
            $table->foreign('produk_id')
                ->references('id')
                ->on('produk')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanan');
    }
}
