<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('knp_pegawai', function (Blueprint $table) {
            $table->id('id_knppegawai');
            $table->unsignedBigInteger('id_pegawai');
            $table->string('knp_terakhir', 255)->nullable();
            $table->string('knp_datang', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('pensiun', 255)->nullable();
            $table->string('timestamp', 255)->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knp_pegawai');
    }
};
