<?php

use Illuminate\Database\Seeder;
use App\Models\Configuracion\TipoEnvio;

class TipoEnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEnvio::create([
            'id_empresa'=>  '1'
            ,'estatus'   =>  '1'
            ,'clave'     =>  '1'
            ,'nombre'    =>  'Sobre'
            ,'descripcion' => 'Valor para los envios tipo sobre'
        ]);

        TipoEnvio::create([
            'id_empresa'=>  '1'
            ,'estatus'   =>  '1'
            ,'clave'     =>  '2'
            ,'nombre'    =>  'Pieza'
            ,'descripcion' => 'Valor para los envios de piezas identicas'
        ]);

        TipoEnvio::create([
            'id_empresa'=>  '1'
            ,'estatus'   =>  '1'
            ,'clave'     =>  '3'
            ,'nombre'    =>  'MultiPieza'
            ,'descripcion' => 'Valor para los envios de piezas de difeentes tamaños y pesos'
        ]);
    }
}
