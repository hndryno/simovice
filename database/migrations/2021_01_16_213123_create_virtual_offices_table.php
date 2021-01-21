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
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->string('kode_vo', 50)->unique();
            $table->bigInteger('harga_vo');
            $table->dateTime('tanggal_aggrement');
            $table->dateTime('tanggal_selesai');
            $table->bigInteger('fasilitas_meeting_room');
            $table->bigInteger('fasilitas_konsultasi_pajak');
            $table->bigInteger('fasilitas_private_office');
            $table->boolean('papan_nama_perusahaan')->default(0);
            $table->timestamps();

            // $table->foreignId('company_id')->constrained();

            $table->foreign('company_id')->on('companies')->references('id')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('company_id')->on('companies')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
