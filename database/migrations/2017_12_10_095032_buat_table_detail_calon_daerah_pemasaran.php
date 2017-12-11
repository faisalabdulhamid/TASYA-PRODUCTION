<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableDetailCalonDaerahPemasaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_calon_daerah_pemasaran', function (Blueprint $table) {
            $table->unsignedInteger('kriteria_id');
            $table->unsignedInteger('calon_daerah_pemasaran_id');
            $table->unsignedInteger('nilai');

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriteria')
                ->onDelete('cascade');

            $table->foreign('calon_daerah_pemasaran_id')
                ->references('id')
                ->on('calon_daerah_pemasaran')
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
        Schema::dropIfExists('detail_calon_daerah_pemasaran');
    }
}
