<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;
class mascotacontrol extends Controller
{
    public function index(Request $request){
        if($request -> ajax()){
            $mascotas=DB::select('CALL sp_listanimales()');
            return DataTables()::of($mascotas)
                   ->addColumn('action',function($mascotas){
                       $acciones='<a  href="javascript::void(0)" onclick=" editarmascota('.$mascotas->ani_id.')"  class="btn btn-info btn-sm">Editar</a>';
                       $acciones.='&nbsp;<button type="button" name="delete"id="'.$mascotas->ani_id.'"  class="delete btn btn-danger btn-sm">Eliminar</button>';
                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }

            return view('mascota.index');
    }

    public function registrar(Request $request){
        $mascotas=DB::select('CALL sp_nuevo_animal(?,?,?,?,?,?,?)',
        [$request->ani_dni,$request->ani_nombre,$request->ani_especie,
        $request->ani_raza,$request->ani_color,$request->ani_fecha,$request->ani_genero]);
        return back();
    }
    public function eliminar($id){
        $mascotas=DB::select('CALL sp_eliminar_mascota(?)',[$id]);
    }
    public function editar($id){
        $mascotas = DB::select('call sp_1mascota(?)',[$id]);
        return response()->json($mascotas);
    }
    public function actualizar(Request $request){
        $propietario=DB::select('call sp_actualizar_animal(?,?,?,?,?,?,?)',
        [$request->ani_id,$request->ani_nombre,$request->ani_especie,$request->ani_raza,$request->ani_color,$request->ani_fecha,$request->ani_genero]);
        return back();
    }
    public function buscar($dni){
        $propietario = DB::select('call sp_buscarpropietario(?)',[$dni]);
        return response()->json($propietario);
    }

}
