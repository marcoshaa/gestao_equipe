<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewMaterialTable extends Migration
{

    public function up()
    {
        Schema::create('view_material', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_material');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('view_material');
    }
}
