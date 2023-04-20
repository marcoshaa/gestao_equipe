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
            $table->string('title');
            $table->integer('id_materia');
            $table->string('alternativa_1');
            $table->string('alternativa_2');
            $table->string('alternativa_3');
            $table->string('alternativa_4');
            $table->string('alternativa_correta');
            $table->timestamps();
        });

        foreach($this->items as $item){            
            DB::table('alternative')->insert(
                array(
                    'title'=>$item,
                    'id_materia'=>$item,
                    'alternativa_1'=>$item,
                    'alternativa_2'=>$item,
                    'alternativa_3'=>$item,
                    'alternativa_4'=>$item,
                    'alternativa_correta'=>$item,
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
