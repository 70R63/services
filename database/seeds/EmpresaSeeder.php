<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Empresa::create([
            'razon_social' => 'ULALAEXPRESS',
            'responsable_legal' => 'Ivone',
            'email' => 'ivone@ulalaexpress.com',
        ]);
    }
}
