<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonDaerahPemasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_daerah_pemasaran', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->unsignedInteger('pegawai_id');
            $table->unsignedInteger('kota_id')->unique();
            $table->unsignedInteger('kriteria_id');

            $table->foreign('pegawai_id')
                ->references('id')
                ->on('pegawai')
                ->onDelete('cascade');
            $table->foreign('kota_id')
                ->references('id')
                ->on('kota')
                ->onDelete('cascade');
            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriteria')
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
        Schema::dropIfExists('calon_daerah_pemasaran');
    }
}
