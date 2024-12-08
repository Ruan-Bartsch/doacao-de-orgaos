<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioOrgaoTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_orgao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relaciona com usuários
            $table->foreignId('orgao_id')->constrained('orgaos')->onDelete('cascade'); // Relaciona com órgãos
            $table->enum('tipo', ['doador', 'receptor']); // Define o tipo de relação
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_orgao');
    }
}
