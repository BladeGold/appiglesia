<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_date', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento');
            $table->string('telefono');
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->string('cedula')->unique();
            $table->string('estado');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('nacionalidad');
            $table->string('estado_civil');
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
        Schema::dropIfExists('users_date');
    }
}
