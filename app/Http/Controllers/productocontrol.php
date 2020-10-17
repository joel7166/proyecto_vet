<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
                   $acciones='<a href="javascript::void(0)"   class="btn btn-info btn-sm">Editar</a>';
                   $acciones.='&nbsp;<button type="button" name="delete" id="'.$productos->prod_id.'"   class=" delete btn btn-danger btn-sm">Eliminar</button>';

                   return $acciones;

               })
               ->rawColumns(['action'])
               ->make(true);

    }

     return view('producto.producto');
 }

  public function eliminar($id){
    $producto=DB::select('call eliminar_producto(?)',[$id]);
}

}
