<?php

namespace App\Http\Controllers\Api;

use App\Atencion;
use App\Document;
use App\Http\Controllers\Controller;
use App\Sector;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function sectores()
    {
    	$sectores = Sector::where('estado', 'on')->get(['id', 'nombre']);


		return response()->json(['status'=>'ok','data'=>$sectores],200);

    }
    public function store(Request $request)
    {
    	$request->validate([
            'detalle_atencion'     => 'required',
            'observacion_atencion' => 'required',
            'fecha_atencion'       => 'required',
            'longitud'             => 'required',
            'estado'               => 'required',
            'accion'               => 'required',
            'latitud'              => 'required',
            // 'archivos.*' => 'mimes:pdf'
        ],[
            'fecha_atencion.required'       => 'No has seleccionado la fecha de atencion',
            'detalle_atencion.required'     => 'No has agregado el detalle de la atencion',
            'observacion_atencion.required' => 'No has agregado la observacion',
            'longitud.required'             => 'No has agregado la ubicacion georeferenciada',
            'latitud.required'              => 'No has agregado la ubicacion georeferenciada',
        ]); 
        $atencion                  =  new Atencion;
        $atencion->coordinador_id  = $request->coordinador_id;
        $atencion->operador_id     = $request->operador_id;
        $atencion->tipo_control_id = $request->tipo_control_id;
        $atencion->sector_id       = $request->sector_id;
        $atencion->accion          = $request->accion;
        $atencion->detalle         = $request->detalle_atencion;
        $atencion->observacion     = $request->observacion_atencion;
        $atencion->fecha_atencion  = $request->fecha_atencion;
        $atencion->latitud         = $request->latitud;
        $atencion->longitud        = $request->longitud;
        $atencion->estado          = $request->estado;
        $atencion->save();

        if ($request->hasFile('archivos')) {
			   if (count($request->archivos) > 0) {
                foreach ($request->archivos as $archivo) {
                $nombre   = time().'_'.$archivo->getClientOriginalName();
                $urldocumento  = '/atenciones/'.$nombre;
                $archivo->storeAs('atenciones',  $nombre, 'public_upload');
                $documento = new Document(['nombre'=> $archivo->getClientOriginalName(), 'extension'=> pathinfo($urldocumento, PATHINFO_EXTENSION), 'archivo'=>$urldocumento]);
                $atencion->documentos()->save($documento);
               }
        }
		}

		return response()->json(['status'=>'Atención Realizada Correctamente','data'=>$atencion],201);
    }
}
