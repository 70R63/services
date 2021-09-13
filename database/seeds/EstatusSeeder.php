<?php

use Illuminate\Database\Seeder;
use App\Models\Configuracion\Estatus;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Estatus::create([
            'id_empresa' => '1',
            'estatus' => '1',
            'clave' => 'Activo'
            ,'descripcion' => 'Valor para los estatus activo'
        ]);

        Estatus::create([
            'id_empresa' => '1',
            'estatus' => '2',
            'clave' => 'Inactivo'
            ,'descripcion' => 'Valor para los estatus inactivo'
        ]);
    }
}
