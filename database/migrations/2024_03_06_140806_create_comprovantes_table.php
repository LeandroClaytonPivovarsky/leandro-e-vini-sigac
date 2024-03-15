<?php

namespace App\Facilitador;

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
        Schema::create('comprovantes', function (Blueprint $table) {
            $facilitador = new Facilitador($table);
            $table->id();
            $table->float('horas');
            $table->string('atividade');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('aluno_id');
            $facilitador->chaveEstrangeira('categoria_id', 'categorias');
            $facilitador->chaveEstrangeira('aluno_id', 'alunos');
            $facilitador->chaveEstrangeira('user_id', 'users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprovantes');
    }
};
