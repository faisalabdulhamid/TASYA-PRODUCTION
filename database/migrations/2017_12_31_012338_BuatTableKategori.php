<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->string('url', 50)->primary();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::table('produk', function(Blueprint $table) {
            $table->string('kategori_id', 50)->nullable();

            $table->foreign('kategori_id')
                ->references('url')
                ->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function(Blueprint $table) {
            $table->dropColumn('kategori_id');
        });
        Schema::dropIfExists('kategori');
    }
}
