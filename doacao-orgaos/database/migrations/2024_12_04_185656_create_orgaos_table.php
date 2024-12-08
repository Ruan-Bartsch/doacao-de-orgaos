<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgaosTable extends Migration
{
    public function up()
    {
        Schema::create('orgaos', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do órgão
            $table->string('description')->nullable(); // Descrição do órgão (opcional)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orgaos');
    }
}
