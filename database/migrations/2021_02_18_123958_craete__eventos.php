<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iglesia_id');
            $table->foreign('iglesia_id')
                    ->references('id')
                    ->on('iglesias')
                    ->onDelete('cascade')
                    ->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->text('descripcion');
            $table->string('title');
            $table->string('color');
            $table->string('textColor');
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
        //
    }
}
