<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->integer('id_materia');
            $table->string('alternativa_1');
            $table->string('alternativa_2');
            $table->string('alternativa_3');
            $table->string('alternativa_4');
            $table->string('alternativa_correta');
            $table->timestamps();
        });

        for($i = 0; $i < 30; $i++){            
            DB::table('alternative')->insert(
                array(
                    'title'=>'questao_'.$i,
                    'id_materia'=>1,
                    'alternativa_1'=>'alternativa_1',
                    'alternativa_2'=>'alternativa_2',
                    'alternativa_3'=>'alternativa_3',
                    'alternativa_4'=>'alternativa_4',
                    'alternativa_correta'=>'alternativa'.$i,
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative');
    }
}
