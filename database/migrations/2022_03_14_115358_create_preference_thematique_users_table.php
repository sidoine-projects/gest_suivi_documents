<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferenceThematiqueUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preference_thematique_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('thematique_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('thematique_id')->references('id')->on('thematiques')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preference_thematique_users');

        
        Schema::table('preference_thematique_users', function (Blueprint $table) {

            $table->dropForeign('preference_thematique_users_user_id_foreign');
            $table->dropIndex('preference_thematique_users_user_id_index');
            $table->dropForeign('preference_thematique_users_thematique_id_foreign');
            $table->dropIndex('preference_thematique_users_thematique_id_index');
            $table->dropColumn('user_id');
            $table->dropColumn('thematique_id');

        });
        

    }
}
