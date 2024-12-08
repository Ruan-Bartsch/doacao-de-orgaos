<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalUserTable extends Migration
{
    public function up()
    {
        Schema::create('hospital_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); // Relacionamento com hospitais
            $table->unsignedBigInteger('user_id'); // Relacionamento com usuários
            $table->timestamps();

            // Definir chaves estrangeiras
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospital_user');
    }
}
