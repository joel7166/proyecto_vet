<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;
class ventacontrol extends Controller
{
 public function venta(Request $request){
    if($request -> ajax()){
        $ventas=DB::select('CALL listar_venta()');
        return DataTables()::of($ventas)
               ->addColumn('action',function($ventas){
                   $acciones='<a href="javascript::void(0)"   class="btn btn-info btn-sm">Editar</a>';
                  $acciones.='&nbsp;<button type="button"  class="delete btn btn-danger btn-sm">Eliminar</button>';
                   return $acciones;
               })
               ->rawColumns(['action'])
               ->make(true);
    }
     return view('ventas.venta');
 }
 public function registrar(Request $request){
    $venta=DB::select('CALL registar_venta(?,?,?,?,?,?,?)',
    [$request->usu_id,$request->pro_id,$request->ven_numero_comprobante,
    $request->ven_tipo_comprobante,$request->ven_fecha_hora,$request->ven_impuesto,
    $request->ven_total_venta]);

    return back();
}

}
