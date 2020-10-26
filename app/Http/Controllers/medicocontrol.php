<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;
class medicocontrol extends Controller
{
    public function index( Request $request){
        if($request -> ajax()){
            $medicos=DB::select('CALL sp_listmedico()');
            return DataTables()::of($medicos)
                   ->addColumn('action',function($medicos){
                       $acciones='<a href="javascript::void(0)" onclick=" editarmedico('.$medicos->med_id.')"  class="btn btn-info btn-sm">Editar</a>';
                       $acciones.='&nbsp;<button type="button" name="delete" id="'.$medicos->med_id.'" class="delete btn btn-danger btn-sm">Eliminar</button>';
                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
            return view('medico.index');
    }
    public function registrar(Request $request){
        $medico=DB::select('CALL sp_nuevomedico(?,?,?,?,?,?,?)',
        [$request->med_dni,$request->med_nombre,$request->med_apellidos,$request->med_telefono,$request->med_email,$request->med_genero,$request->med_fecha]);

        return back();
    }
    public function eliminar($id){
        $medicos=DB::select('CALL sp_eliminarmedico(?)',[$id]);
    }
    public function editar($id){
        $medico = DB::select('call sp_1medico(?)',[$id]);
        return response()->json($medico);
    }
    public function actualizar(Request $request){
        $medico=DB::select('call sp_editarmedico(?,?,?,?,?,?,?)',
        [$request->id,$request->nombre,$request->apellidos,$request->telefono,$request->correo,$request->genero,$request->fecha]);
        return back();
    }

}

