<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionPrecioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion_precio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('zona')->default(1);
            $table->tinyInteger('tipo_envio')->default(1);
            $table->float('precio', 8, 2);
            $table->tinyInteger('peso')->default(1);
            $table->tinyInteger('id_mensajeria')->default(1);
            $table->tinyInteger('id_empresa')->default(1);

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracion_precio');
    }
}
