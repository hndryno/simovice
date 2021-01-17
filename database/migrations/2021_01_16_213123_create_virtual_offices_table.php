<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('perusahaan_id');
            $table->string('pic');
            $table->bigInteger('telepon');
            $table->string('email');
            $table->bigInteger('harga_vo');
            $table->dateTime('tanggal_aggrement');
            $table->dateTime('tanggal_selesai');
            $table->string('fasilitas_meeting_room');
            $table->bigInteger('fasilitas_konsultasi_pajak');
            $table->bigInteger('fasilitas_private_office');
            $table->boolean('papan_nama_perusahaan')->default(0);
            $table->timestamps();

            $table->foreign('perusahaan_id')->on('companies')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_offices');
    }
}
