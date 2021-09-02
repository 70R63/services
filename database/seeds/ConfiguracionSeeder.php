<?php

use Illuminate\Database\Seeder;
use App\Models\Configuracion\Configuracion;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Configuracion::create([
            'propiedad' => 'FSC'
            ,'valor' => '10'
            ,'id_empresa' => '1'
        ]);
    }
}
