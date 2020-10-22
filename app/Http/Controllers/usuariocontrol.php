<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use Illuminate\Http\Request;//para recuperar datos de la vista

use DataTables;


//use DataTables;
class usuariocontrol extends Controller
{
    public function index( Request $request){
        if($request -> ajax()){
            $usuarios=DB::select('CALL sp_listusuario()');
            return DataTables()::of($usuarios)
                   ->addColumn('action',function($usuarios){
                       $acciones='<a href="javascript::void(0)" onclick=" editarusuario('.$usuarios->usu_id.')" class="btn btn-info btn-sm">Editar</a>';
                       $acciones.='&nbsp;<button type="button" name="delete" id="'.$usuarios->usu_id.'" class=" delete btn btn-danger btn-sm">Eliminar</button>';

                       return $acciones;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
            return view('usuario.index');
      }
    public function eliminar($usu_id){
        $usuarios=DB::select('CALL sp_eliminarusuario(?)',[$usu_id]);
    }

    public function registrar(Request $request){
        //llamar al procedimiento almacenado
        $usuarios=DB::select('call registar_usuario(?,?,?,?,?,?,?,?)',
        [$request->per_id,$request->usu_dni,
        $request->usu_email,$request->usu_contrasenia,$request->usu_nombres,
        $request->usu_apellidos,$request->usu_celular,$request->usu_estado]);
        return back();
    }
    public function actualizar(Request $request){
        $usuarios=DB::select('call actualizar_usuario(?,?,?,?,?,?,?,?)',
        [$request->per_id,$request->id_per,
        $request->usu_email,$request->usu_contraseña,$request->usu_nombres,
        $request->usu_apellidos,$request->usu_celular,$request->usu_estado]);
        return back();
    }



      public function editar($id){

        $usuarios = DB::select('call editar_usuario(?)',[$id]);
        return response()->json($usuarios);
      }


}


