<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista
use DataTables;

class perfilcontrol extends Controller
{
 public function perfil( Request $request){
    if($request ->ajax()){
        $perfiles=DB::select('call listar_perfil()');

        return DataTables()::of($perfiles)
               ->addColumn('action',function($perfiles){
                   $acciones='<a href="javascript::void(0)" onclick=" editaranimal('.$perfiles->per_id.')" class="btn btn-info btn-sm">Editar</a>';
                   $acciones.='&nbsp;<button type="button" name="delete" id="'.$perfiles->per_id.'"  class=" delete btn btn-danger btn-sm">Eliminar</button>';

                   return $acciones;

               })
               ->rawColumns(['action'])
               ->make(true);

    }

     return view('perfil.perfil');
 }
 public function registrar(Request $request){

    //llamar al procedimiento almacenado
    $perfil=DB::select('call registrar_perfil(?,?)',
    [$request->per_nombre,$request->per_descripcion]);

    return back();

  }

  public function eliminar($id){
    $perfil=DB::select('call eliminar_perfil(?)',[$id]);
}
public function editar($id){

    $perfil = DB::select('call editar_perfil(?)',[$id]);
    return response()->json($perfil);
  }
  public function actualizar(Request $request){
    $perfil=DB::select('call actualizar_perfil(?,?,?)',
    [$request->per_id, $request->per_nombre,$request->per_descripcion]);
    return back();

}

}
