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
        Schema::create('hoteles', function (Blueprint $table) {
            $table->integer('idhotel', true);
            $table->string('nombre');
            $table->string('codnifrfc');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('idciudad');
            $table->integer('numhabitaciones');
            $table->boolean('is_activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteles');
    }
};
