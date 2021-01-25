<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iglesia_id');
            $table->foreign('iglesia_id')
                ->references('id')
                ->on('iglesias')
                ->onDelete('cascade');
            $table->enum('categoria', ['Diezmo_Total','Diezmo_Pastor','Diezmo_Ministros' ,'Damas','Jovenes','Ninos','DLD','Caballeros', 'Patrimonio_Historico','Domingo_2','Domingo_3','Domingo_4','Impulso_Mundial','Impulso_Nacional','Tabernaculo_Nacional','Pago_Prestamos','Otros_Propositos','Diezmo_Restante','Fondo_Local']);
            $table->unsignedInteger('monto');
            $table->date('fecha');
            $table->unsignedInteger('inicial')->nullable();
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
        Schema::dropIfExists('balance');
    }
}
