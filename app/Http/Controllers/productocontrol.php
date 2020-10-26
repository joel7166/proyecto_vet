<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\models\categoria;
use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista
use DataTables;

class productocontrol extends Controller
{
 public function producto(Request $request){
    if($request ->ajax()){
        $productos=DB::select('call listar_producto()');

        return DataTables()::of($productos)
                ->addColumn('action',function($productos){
                    $acciones='<a href="javascript::void(0)" onclick=" editaranimal('.$productos->prod_id.')"  class="btn btn-info btn-sm">Editar</a>';
                    $acciones.='&nbsp;<button type="button" name="delete" id="'.$productos->prod_id.'"   class=" delete btn btn-danger btn-sm">Eliminar</button>';

                    return $acciones;

                })
                ->rawColumns(['action'])
                ->make(true);
    }
    $categoria = categoria::get();
    return view('producto.producto',['categoria'=>$categoria,'categoria1'=>$categoria]);
 }
 public function registrar(Request $request){

    //llamar al procedimiento almacenado
    $producto=DB::select('call registar_producto(?,?,?,?,?)',
    [$request->catp_id,$request->prod_codigo,$request->prod_nombre,$request->prod_stock,$request->prod_descripcion]);

    return back();

  }

  public function eliminar($id){
    $producto=DB::select('call eliminar_producto(?)',[$id]);
}
public function editar($id){

    $producto = DB::select('call editar_producto(?)',[$id]);
    return response()->json($producto);
  }
  public function actualizar(Request $request){
    $producto=DB::select('call actualizar_producto(?,?,?,?,?,?)',
    [$request->prod_id, $request->catp_id,$request->prod_codigo,$request->prod_nombre,
    $request->prod_stock,$request->prod_descripcion]);
    return back();

}

}
