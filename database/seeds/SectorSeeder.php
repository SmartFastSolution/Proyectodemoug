<?php

use App\Sector;
use App\TipoRequerimiento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $sectors = array('SECTOR 1', 'SECTOR 2', 'SECTOR 3','SECTOR 4','SECTOR 5', 'SECTOR 6');
         $tipos = array('Chilo Supressalis', 'Rosquillas', 'Pudenta', 'Piricularia', 'Malas hierbas', 'Agallador');
       
         foreach ($sectors as $sector) {
           DB::table('sectors')->insert([
					'nombre'      => $sector,
					'descripcion' => 'Descripcion del sector',
					'estado'      => 'on',
            ]);
        }



          foreach ($tipos as $tipo) {
           DB::table('tipo_controls')->insert([
					'nombre'          => $tipo,
					'parametrizacion' => $tipo,
					'descripcion'     => 'Descripcion del Tipo',
					'estado'          => 'on',
            ]);
        }
    }
}
