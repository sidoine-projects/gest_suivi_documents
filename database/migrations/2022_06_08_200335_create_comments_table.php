<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('actualite_id')->unsigned();
           // $table->integer('user_id')->unsigned();
            $table->longText('comment');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('actualite_id')->references('id')->on('actualite_admins')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('comments');

        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign('comments_user_id_foreign');
            $table->dropIndex('comments_user_id_index');
            $table->dropColumn('user_id');

            $table->dropForeign('comments_actualite_id_foreign');
            $table->dropIndex('comments_actualite_id_index');
            $table->dropColumn('actualite_id');
        });
    }
}
