<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration
{
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log');
    }
}
