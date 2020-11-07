<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd desde procedimientos almacenados
use Illuminate\Http\Request;//para recuperar datos de la vista
use App\models\medico;
use App\models\animal;
use App\models\servicio;
use App\models\enfermedad;
use App\models\producto;

use DataTables;

class atencioncontrol extends Controller
{

    public function index(){
        $med = medico::get();
        $ani = animal::get();
        $serv = servicio::get();
        $enf = enfermedad::get();
        $prod = producto::get();
        
        return view('atencion.index',
        [
            'med'=>$med,'ani'=>$ani,'serv'=>$serv,'enf'=>$enf,'prod'=>$prod
        ]);
    }

    public function listaserv(Request $request){
        if($request->Ajax()){
            $detserv=DB::select('CALL sp_detAtencion()');
            return DataTables()::of($detserv)
                   ->addColumn('action',function($detserv){
                       $acciones='<button type="button" name="delete" id="'.$detserv->deta_id.'" class=" delete btn btn-danger btn-sm">
                       eliminar
                       </button>';
                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        
        }
        return view('atencion.index');
    }
    public function servBoleta($id){
        $Boleta= DB::select("call sp_serviciosPrestados(?)",[$id]);
        return response()->json($Boleta);
    }
    public function lista(Request $request){
        if($request->Ajax()){
            $atencionBoleta=DB::select('CALL sp_detAtencion()');
            return DataTables()::of($atencionBoleta)
                   
                   ->rawColumns(['action'])
                   ->make(true);
        }
        return view('atencion.index');
    }
    public function registrar(Request $request){

        //llamar al procedimiento almacenado
        $enfermedad=DB::select('call sp_nuevoatencion_medica(?,?,?,?)',
        [$request->ani_id,$request->med_id,$request->ser_id,$request->det_diagnostico]);

        return back();
        
    }
    public function registrardetalle(Request $request){

        //llamar al procedimiento almacenado
        $enfermedad=DB::select('call sp_nuevo_detalle_atencion(?,?,?,?)',
        [$request->ate_id,$request->enf_id,$request->prod_id,$request->dosis]);

        return back();
        
    }

    public function atencion()
    {
        $atencion = DB::select('call ultima_atencion()');
            return response()->json($atencion);
    }

    public function fecha()
    {
        $fecha_a = DB::select("select now() as fecha");
        return $fecha_a;
    }

    public function eliminar($id){
        $ventas=DB::select("delete from detalle_atencion where deta_id='$id'");
        
    }
    
    public function serv_precio($id)
    {
        $precio = DB::select("select ser_precio from servicios where ser_id='$id'");
        return response()->json($precio);
    }
}