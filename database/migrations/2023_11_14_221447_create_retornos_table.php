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
        Schema::create('retornos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telefone');
            $table->date('data');
            $table->string('hora');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_consultas');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retornos');
    }
};
