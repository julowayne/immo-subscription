<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('body');
            $table->timestamp('date');
            $table->boolean('published');
            $table->string('image')->default('https://i.picsum.photos/id/213/4928/3264.jpg?hmac=OC0yPL-iiM1YgVjpAjbMf51MjnR6cycgmn1TSLJhDZ0');
            $table->string('image_id')->default('');
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
