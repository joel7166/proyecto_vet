<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista
use DataTables;

class categoriacontrol extends Controller
{
 public function categoria( Request $request){
    if($request ->ajax()){
        $categorias=DB::select('call listar_categoria()');

        return DataTables()::of($categorias)
               ->addColumn('action',function($categorias){
                   $acciones='<a href="javascript::void(0)" onclick=" editaranimal('.$categorias->catp_id.')"  class="btn btn-info btn-sm">Editar</a>';
                   $acciones.='&nbsp;<button type="button"  name="delete" id="'.$categorias->catp_id.'"  class=" delete btn btn-danger btn-sm">Eliminar</button>';

                   return $acciones;

               })
               ->rawColumns(['action'])
               ->make(true);

    }

     return view('producto.categoria');
 }
 public function registrar(Request $request){

    //llamar al procedimiento almacenado
    $categoria=DB::select('call registar_categoria(?,?)',
    [$request->catp_nombre,$request->catp_descripcion]);

    return back();

  }
  public function eliminar($id){
    $categoria=DB::select('call eliminar_categoria(?)',[$id]);
}

public function editar($id){

    $categoria = DB::select('call editar_categoria(?)',[$id]);
    return response()->json($categoria);
  }

  public function actualizar(Request $request){
    $categoria=DB::select('call actualizar_categoria(?,?,?)',
    [$request->catp_id, $request->catp_nombre,$request->catp_descripcion]);
    return back();

}

}
