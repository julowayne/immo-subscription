<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->boolean('isAdmin')->default(false);
            $table->string('avatar')->default('https://res.cloudinary.com/dgcdoxa67/image/upload/v1624271163/utilisateur_bqsfxo.png');
            $table->string('avatar_id')->default('');
            $table->string('firstname');
            $table->string('lastname');
            $table->bigInteger('siret');
            $table->string('email')->unique();
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
