<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;
class venta1control extends Controller
{
    public function index(){
        return view("venta.index");
    }
    /*public function index( Request $request){
        if($request -> ajax()){
            $usuarios=DB::select('CALL sp_listusuario()');
            return DataTables()::of($usuarios)
                   ->addColumn('action',function($usuarios){
                       $acciones='<a href="#" class="btn btn-info btn-sm">Editar</a>';
                       $acciones.='&nbsp;<button type="button" name="delete" id="'.$usuarios->usu_id.'" class=" delete btn btn-danger btn-sm">Eliminar</button>';

                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
            return view('usuario.index');
      }
    public function editar(){

        return view('usuario.editar');
    }
    public function eliminar($usu_id){
        $usuarios=DB::select('CALL sp_eliminarusuario(?)',[$usu_id]);
    }

    public function registrar(Request $request){

        //llamar al procedimiento almacenado
        $usuarios=DB::select('call registar_usuario(?,?,?,?,?,?,?,?,?)',
        [$request->usu_id,$request->per_id,$request->usu_dni,
        $request->usu_email,$request->usu_contrasenia,$request->usu_nombres,
        $request->usu_apellidos,$request->usu_celular,$request->usu_estado]);

        return back();

    }
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
    }*/
    public function registrar(Request $request){
        $venta=DB::select('CALL registar_venta(?,?,?,?,?,?,?)',
        [$request->usu_id,$request->pro_id,$request->ven_numero_comprobante,
        $request->ven_tipo_comprobante,$request->ven_fecha_hora,$request->ven_impuesto,
        $request->ven_total_venta]);

        return back();
    }
    
    public function registrarnuevo(Request $request){

        //llamar al procedimiento almacenado
        $detaventa=DB::select('call registar_detallevennta(?,?,?,?,?)',
        [$request->ven_id,$request->prod_id,$request->detv_cantidad,
        $request->detv_precio_venta,$request->detv_descuento]);
    
        return back();
    
    }
    public function ultimaventa(){
        $venta = DB::select('call ultima_venta()');
        return response()->json($venta);
    }
}
