<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\usuario;
use App\models\propietario;
use App\models\producto;


use DataTables;
class venta1control extends Controller
{
    public function index(){

        $usuarios = usuario::get();
        $propietarios = propietario::get();
        $productos = producto::get();
        return view('venta.index',['usuario' => $usuarios,'propietarios'=>$propietarios,'productos'=>$productos]);
        
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
        //$venta = DB::select('call ultima_venta()');
        $venta = DB::select("select max(ven_id) as ven_id from venta");
        return $venta;
    }
    public function listaproducto(Request $request){
        if($request->Ajax()){
            $ventaproducto=DB::select('CALL sp_ventaproducto()');
            return DataTables()::of($ventaproducto)
                   ->addColumn('action',function($ventaproducto){
                       $acciones='<button type="button" name="delete" id="'.$ventaproducto->detv_id.'" class=" delete btn btn-danger btn-sm">
                       eliminar
                       </button>';
                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        
        }
        return view('venta.index');
    }

    public function codigo(){
        $codigo= DB::select("select max(ven_numero_comprobante)+1 as num, now() as fecha
        from venta" );
        return $codigo;
        
    }
    public function prod_precio($id){
        $precioprod= DB::select("select prod_preciou from producto where prod_id='$id'");
        return response()->json($precioprod);
    }
    
    public function totalP($id){
        $venta= DB::select("select ven_total_venta as total, ven_impuesto as impuesto
                             from venta where ven_id='$id'");
        return response()->json($venta);
    }
    public function eliminar($id){
        $ventas=DB::select('CALL sp_eliminardetventa(?)',[$id]);
    }

}