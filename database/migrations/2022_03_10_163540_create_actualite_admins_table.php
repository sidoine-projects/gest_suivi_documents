<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualiteAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualite_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thematique_id')->nullable()->unsigned();
            $table->string('image');
            $table->string('titre');
            $table->string('description');
            $table->string('auteur');
            $table->string('alaune');
            $table->string('arrondissement');
            $table->string('quartier');
            $table->bigInteger('nbrview')->default(0);
            $table->timestamps();
            $table->foreign('thematique_id')->references('id')->on('thematiques')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actualite_admins');

        Schema::table('signalisations', function (Blueprint $table) {

            $table->dropForeign('actualite_admins_thematique_id_foreign');
            $table->dropIndex('actualite_admins_thematique_id_index');
            $table->dropColumn('thematique_id');

        });

    

    }
}
