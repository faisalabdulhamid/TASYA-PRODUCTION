<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableDetailCalonDistributor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_calon_distributor', function (Blueprint $table) {
            $table->unsignedInteger('kriteria_id');
            $table->unsignedInteger('calon_distributor_id');
            $table->unsignedInteger('nilai');
            
            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriteria_distributor')
                ->onDelete('cascade');

            $table->foreign('calon_distributor_id')
                ->references('id')
                ->on('calon_distributor')
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
        Schema::dropIfExists('detail_calon_distributor');
    }
}
