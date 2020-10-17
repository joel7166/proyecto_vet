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
            $mascotas=DB::select('CALL sp_listmascotas()');
            return DataTables()::of($mascotas)
                   ->addColumn('action',function($mascotas){
                       $acciones='<a href="javascript::void(0)" class="btn btn-info btn-sm">Editar</a>';
                       $acciones.='&nbsp;<button type="button" name="delete" class="delete btn btn-danger btn-sm">Eliminar</button>';
                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
            return view('mascota.index');
    }
    /*public function registrar(Request $request){
        $propietario=DB::select('CALL sp_nuevopropietario(?,?,?,?,?,?,?)',
        [$request->pro_dni,$request->pro_nombre,$request->pro_apellidos,$request->pro_telefono,$request->pro_email,$request->pro_direccion,$request->pro_ciudad]);

        return back();
      }
    public function eliminar($id){
        $propietarios=DB::select('CALL sp_eliminarpropietario(?)',[$id]);
    }
    public function editar($id){
        $propietario = DB::select('call sp_1propietario(?)',[$id]);
        return response()->json($propietario);
    }
    public function actualizar(Request $request){
        $propietario=DB::select('call sp_editarpropietario(?,?,?,?,?,?,?)',
        [$request->id,$request->nombre,$request->apellidos,$request->telefono,$request->correo,$request->direccion,$request->ciudad]);
        return back();
    }*/

}