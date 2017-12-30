<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_distributor', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->unsignedInteger('pegawai_id');
            $table->unsignedInteger('pelanggan_id')->unique();

            $table->foreign('pegawai_id')
                ->references('id')
                ->on('pegawai')
                ->onDelete('cascade');
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggan')
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
        Schema::dropIfExists('calon_distributor');
    }
}
