<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosZonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_zona', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('id_empresa')->default(1);
            $table->tinyInteger('id_mensajeria')->default(1);
            $table->char('grupo_origen',1)->default('A');
            $table->char('grupo_destino',1)->default('A');
            $table->tinyInteger('zona')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envios_zona');
    }
}
