<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista
use DataTables;

class detalleventacontrol extends Controller
{
 public function detalleventa(Request $request ){
    if($request ->ajax()){
        $deventas=DB::select('call listar_detalleventa()');

        return DataTables()::of($deventas)
               ->addColumn('action',function($productos){
                   $acciones='<a href="javascript::void(0)"  class="btn btn-info btn-sm">Editar</a>';
                   $acciones.='&nbsp;<button type="button"    class=" delete btn btn-danger btn-sm">Eliminar</button>';

                   return $acciones;

               })
               ->rawColumns(['action'])
               ->make(true);

    }


     return view('ventas.detalleventa');
 }
 public function registrar(Request $request){

    //llamar al procedimiento almacenado
    $detaventa=DB::select('call registar_detallevennta(?,?,?,?,?)',
    [$request->ven_id,$request->prod_id,$request->detv_cantidad,
    $request->detv_precio_venta,$request->detv_descuento]);

    return back();

  }

}
