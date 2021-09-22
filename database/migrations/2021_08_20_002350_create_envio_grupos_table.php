<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvioGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_grupo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->mediumInteger('cp_inicial')->default('00000');
            $table->mediumInteger('cp_final')->default('00000');
            $table->char('grupo',1)->default('A');
            $table->string('entidad_federativa',25)->default('Entidad Default');
            $table->tinyInteger('id_empresa')->default(1);
            $table->tinyInteger('id_mensajeria')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envios_grupo');
    }
}
