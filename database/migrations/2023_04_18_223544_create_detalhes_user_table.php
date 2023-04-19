<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalhesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes_user', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('sexo')->nullable();
            $table->string('formacao',40)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('cep',10)->nullable();
            $table->string('estado',60)->nullable();
            $table->string('cidade',100)->nullable();
            $table->string('bairro',80)->nullable();
            $table->string('rua',140)->nullable();
            $table->string('numero',5)->nullable();
            $table->text('complemento')->nullable();
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
        Schema::dropIfExists('detalhes_user');
    }
}
