<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prename');
            $table->string('email')->unique();
            $table->string('tel')->unique();
            $table->string('adresse')->nullable();
            $table->string('status')->nullable();
            $table->string('role_name')->nullable()->default('users');
            $table->unsignedBigInteger('profil_id')->nullable(); // Rend profil_id nullable
            $table->foreign('profil_id')->references('id')->on('profils')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
