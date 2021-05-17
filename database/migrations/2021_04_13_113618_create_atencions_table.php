<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operador_id')->nullable();
            $table->unsignedBigInteger('coordinador_id')->nullable();
            $table->unsignedBigInteger('tipo_control_id')->nullable();
            $table->text('detalle');
            $table->longText('observacion');
            $table->longText('accion')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('set null');
            $table->date('fecha_atencion')->nullable();            
            $table->double('latitud')->nullable();        
            $table->double('longitud')->nullable(); 
            $table->string('estado');
            $table->foreign('tipo_control_id')->references('id')->on('tipo_controls')->onDelete('set null');
            $table->foreign('operador_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('coordinador_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('atencions');
    }
}
