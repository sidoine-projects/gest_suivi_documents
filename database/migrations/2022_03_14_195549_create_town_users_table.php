<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('town_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('arrondissement');
            $table->string('quartier')->nullable();
            $table->boolean('status')->default('0');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        
        Schema::dropIfExists('town_users');

        Schema::table('town_users', function (Blueprint $table) {

            $table->dropForeign('town_users_user_id_foreign');
            $table->dropIndex('town_users_user_id_index');
            $table->dropColumn('user_id');
        });
        
    }
}
