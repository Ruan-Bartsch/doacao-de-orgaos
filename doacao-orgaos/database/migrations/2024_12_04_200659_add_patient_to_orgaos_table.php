<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientToOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orgaos', function (Blueprint $table) {
            $table->string('patient')->nullable()->after('description'); // Adiciona a coluna "patient" após "description"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orgaos', function (Blueprint $table) {
            $table->dropColumn('patient'); // Remove a coluna "patient" caso a migration seja revertida
        });
    }
}
