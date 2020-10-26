<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista
use DataTables;


class serviciocontrol extends Controller
{
 public function index(Request $request){
    if($request ->ajax()){
        $servicios=DB::select('call listar_servicios()');

        return DataTables()::of($servicios)
               ->addColumn('action',function($servicios){
                   $acciones='<a href="javascript::void(0)" onclick=" editar('.$servicios->ser_id.')"  class="btn btn-info btn-sm">Editar</a>';
                   $acciones.='&nbsp;<button type="button"  name="delete" id="'.$servicios->ser_id.'"  class=" delete btn btn-danger btn-sm">Eliminar</button>';

                   return $acciones;

               })
               ->rawColumns(['action'])
               ->make(true);

    }
     return view('servicios.index');
 }
 public function registrar(Request $request){

    //llamar al procedimiento almacenado
    $servicio=DB::select('call registar_servicio(?,?)',
    [$request->ser_nombre,$request->ser_precio]);

    return back();
  }

  public function eliminar($id){
    $servicio=DB::select('call eliminar_servicio(?)',[$id]);
}
public function editar($id){

    $servicio = DB::select('call editar_servicio(?)',[$id]);
    return response()->json($servicio);
  }

  public function actualizar(Request $request){
    $servicio=DB::select('call actualizar_servicio(?,?,?)',
    [$request->ser_id, $request->ser_nombre,$request->ser_precio]);
    return back();

}

}
