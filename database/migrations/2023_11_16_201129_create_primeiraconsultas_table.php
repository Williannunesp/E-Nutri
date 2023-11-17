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
        Schema::create('primeiraconsultas', function (Blueprint $table) {
            $table->id();
            $table->text('descriçãoficha')->nullable();
            $table->string('fichapc');
            $table->text('descriçãoantro')->nullable();
            $table->string('antropometrica');
            $table->text('descriçãodieta')->nullable();
            $table->string('dieta')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->unsignedBigInteger('agendamentopc_id');
            $table->foreign('agendamentopc_id')->references('id')->on('agendamentopcs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primeiraconsultas');
    }
};
