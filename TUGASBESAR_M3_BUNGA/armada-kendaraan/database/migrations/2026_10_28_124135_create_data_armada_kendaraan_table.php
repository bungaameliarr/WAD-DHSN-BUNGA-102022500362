<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('Data_Armada_Kendaraan', function (Blueprint $table) {
            $table->id('id_armada');
            $table->string('nomor_plat');
            $table->string('unit');
            $table->integer('tahun_pembuatan');
            $table->text('merek');
            $table->string('transmisi');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('Data_Armada_Kendaraan');
    }
};