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

}