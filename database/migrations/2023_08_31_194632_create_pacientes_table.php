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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('datanasc')->nullable();
            $table->string('email')->nullable();
            $table->string('cpf')->nullable();
            $table->string('profissao')->nullable();
            $table->string('celular')->nullable();
            $table->string('telres')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->unsignedBigInteger('estci_id')->nullable();
            $table->foreign('estci_id')->references('id')->on('estadocivils');
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
