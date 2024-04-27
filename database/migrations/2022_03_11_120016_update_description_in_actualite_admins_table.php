<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDescriptionInActualiteAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actualite_admins', function (Blueprint $table) {
            //
            $table->longText('titre')->change();
            $table->longText('description')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actualite_admins', function (Blueprint $table) {
            //
            $table->longText('titre')->change();
            $table->longText('description')->change();
        });
    }
}
