<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista

use DataTables;
class usuariocontrol extends Controller
{
    public function index( Request $request){
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


}


