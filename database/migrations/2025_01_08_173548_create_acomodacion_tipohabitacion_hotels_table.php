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
        Schema::create('acomodacion_tipohabitacion_hotels', function (Blueprint $table) {
            $table->integer('idacom_tipohabhotel', true);
            $table->integer('idhotel')->unsigned();
            $table->integer('idacomodacion')->unsigned();
            $table->integer('idtipoacomodacion')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acomodacion_tipohabitacion_hotels');
    }
};
