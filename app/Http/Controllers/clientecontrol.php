<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;//para trabajar con bd direccion
use App\Models\animal;//mi modelo animal
use Illuminate\Http\Request;//para recuperar datos q fueron enviados mediante post

class clientecontrol extends Controller
{
 public function animal(){
   ;
     $animales = DB::select(' call listar_animal()');
     return view('cliente.animal',['animales'=>$animales]);
 }
public function propietario(){

    return view('cliente.propietario');
}
public function nuevo(){

  return view('cliente.nuevo');
}
// cuando presione el boton submit registrar
public function registrar( request $request){
  animal::create([
    'nombre'=> $request->nombre,
    'especie'=>$request->especie,
    'raza'=>$request->raza,
    'color'=>$request->color,
    'fecha_nacimiento'=>$request->fecha_nacimiento,
    'genero'=>$request->rbgenero,
    'propietario'=>$request->propietario,


  ]);
  
return redirect()->route('cliente.nuevo');
  
}
public function eliminar(animal $animal){
$animal->delete();
return back();

}
 public function editar(animal $animal){
 return view('cliente.editar',compact('animal'));
 

 }
 public function actualizar(request $request){
 $animal= animal::find($request->id);

 $animal->nombre= $request->nombre;
 $animal->especie=$request->especie;
 $animal->raza=$request->raza;
 $animal->color=$request->color;
 $animal->fecha_nacimiento=$request->fecha_nacimiento;
 $animal->genero=$request->rbgenero;
 $animal->propietario=$request->propietario;
 $animal->save();

return back();

 }
}
