<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->longText('body');
            $table->string('photo');
            $table->string('slug');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('events');
    }
};
