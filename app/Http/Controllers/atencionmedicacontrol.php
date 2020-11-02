<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd desde procedimientos almacenados
use Illuminate\Http\Request;//para recuperar datos de la vista
use DataTables;

class atencionmedicacontrol extends Controller
{
 public function index(Request $request){

    if($request ->ajax()){
        $enfermedades=DB::select('call listar_enfermedad()');

        return DataTables()::of($enfermedades)
               ->addColumn('action',function($enfermedades){
                   $acciones='<a href="javascript::void(0)" onclick=" editar('.$enfermedades->enf_id.')"  class="btn btn-info btn-sm">Editar</a>';
                   $acciones.='&nbsp;<button type="button"  name="delete" id="'.$enfermedades->enf_id.'"  class=" delete btn btn-danger btn-sm">Eliminar</button>';

                   return $acciones;

               })
               ->rawColumns(['action'])
               ->make(true);

    }
     return view('atencionmedica.index');
 }
 public function registrar(Request $request){

    //llamar al procedimiento almacenado
    $enfermedad=DB::select('call registar_enfermedad(?,?)',
    [$request->enf_nombre,$request->enf_descripcion]);

    return back();
  }
  public function eliminar($id){
    $enfermedad=DB::select('call eliminar_enfermedad(?)',[$id]);
}
public function editar($id){

    $enfermedad = DB::select('call editar_enfermedad(?)',[$id]);
    return response()->json($enfermedad);
  }

  public function actualizar(Request $request){
    $enfermedad=DB::select('call actualizar_enfermedad(?,?,?)',
    [$request->enf_id, $request->enf_nombre,$request->enf_descripcion]);
    return back();

}

}