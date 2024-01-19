<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('body');
            $table->string('pdf');
            $table->string('logo');
            $table->string('slug');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
       ;
        });
    }

    ///////
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
