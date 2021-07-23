<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_solicitudes', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('pais', 50)->default('México') ;
            $table->string('nombre', 30)->default('Nombre');
            $table->string('compania', 30)->default('Compañia');
            $table->string('calle', 30)->default('Calle');
            $table->string('numero', 10)->default('Numero');
            $table->integer('cp')->default('12345');
            $table->string('colonia', 30)->default('Colonia');
            $table->string('entidad_federativa', 30)->default('Estado');
            $table->string('telefono',10)->default('5555555555');
            $table->string('email', 50)->default('user@ulalaexpress.com');
            $table->string('referencia', 100)->default('Sin Referencia');

            $table->string('pais_d', 50)->default('México') ;
            $table->string('nombre_d', 30)->default('Nombre');
            $table->string('compania_d', 30)->default('Compañia');
            $table->string('calle_d', 30)->default('Calle');
            $table->string('numero_d', 10)->default('Numero');
            $table->integer('cp_d')->default('12345');
            $table->string('colonia_d', 30)->default('Colonia');
            $table->string('entidad_federativa_d', 30)->default('Estado');
            $table->string('telefono_d',10)->default('5555555555');
            $table->string('email_d', 50)->default('user@ulalaexpress.com');
            $table->string('referencia_d', 100)->default('Sin Referencia');
           
            $table->string('servicio', 50)->default('Servicio') ;
            $table->tinyInteger('piezas')->default('10');
            $table->double('peso', 8, 2)->default('10.00');
            $table->double('alto', 4, 2)->default('10.00');
            $table->double('ancho', 4, 2)->default('10.00');
            $table->double('largo', 4, 2)->default('10.00');
            $table->string('contenido', 50)->default('Contenido');
            $table->boolean('seguro')->default(0);
            $table->double('valor_envio', 8, 2)->default('100.00');
            $table->boolean('es_perfil')->default(0);

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
        Schema::dropIfExists('envios_solicitudes');
    }
}
