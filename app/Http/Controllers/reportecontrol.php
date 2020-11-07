<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;
class reportecontrol extends Controller
{
    public function index(Request $request){
        if($request -> ajax()){
            $reporte=DB::select('CALL sp_reporteVentas()');
            return DataTables()::of($reporte)
                   ->addColumn('action',function($reporte){
                       $acciones='<a href="javascript::void(0)" onclick=" detalle_venta('.$reporte->ven_id.')"  class="btn btn-info btn-sm">Ver Detalles</a>';
                       
                      return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
        return view('reporte.index');
    }
    public function lista1(Request $request){
        if($request -> ajax()){
            $reportea=DB::select('CALL sp_reporteAtencion()');
            return DataTables()::of($reportea)
                   ->addColumn('action',function($reportea){
                       $acciones='<a  href="javascript::void(0)" onclick=" detalle_atencion('.$reportea->ate_id.')" class="btn btn-info btn-sm">Ver Detalles</a>';
                       
                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
        return view('reporte.index');
    }
    public function detalle_venta($id)
    {
        $detalleVenta = DB::select('CALL sp_boleta(?)',[$id]);
        return response()->json($detalleVenta);
    }
    public function detalle_venta_lista(Request $request,$id){
        if($request -> ajax()){
            $listaProductos=DB::select('CALL sp_ventaproducto1(?)',[$id]);
            return DataTables()::of($listaProductos)
                   
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('reporte.index');
    }
    public function detalle_atencion($id)
    {
        $DetAtencion= DB::select("call sp_serviciosPrestados(?)",[$id]);
        return response()->json($DetAtencion);
        
    }
    public function detalle_atencion_lista(Request $request,$id){
        if($request -> ajax()){
            $listaDetAt=DB::select('CALL sp_detAtencion1(?)',[$id]);
            return DataTables()::of($listaDetAt)
                   
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('reporte.index');
    }
}

