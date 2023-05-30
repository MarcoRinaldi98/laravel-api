<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //definisco il nome della chiave esterna che voglio recuperare (per inserirla nella tabella projects), con le sue specifiche e gli dico tramite after() dopo quale elemento la voglio inserire nel database
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            //definisco da dove viene preso il contenuto della chiave esterna (type_id), ovvero dall'id della tabella typess 
            $table->foreign('type_id')->references('id')->on('types')->onDelete('SET NULL'); // in caso la tipologia viene eliminata viene dato NULL come valore al project
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // IN CASO DI ROLLBACK
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_user_id_foreign'); //cancello il vincolo
            $table->dropColumn('type_id'); //cancello la tabella
        });
    }
};
