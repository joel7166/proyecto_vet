<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariocontrol;
use App\Http\Controllers\iniciocontrol;
use App\Http\Controllers\productocontrol;
use App\Http\Controllers\citacontrol;
use App\Http\Controllers\informecontrol;
use App\Http\Controllers\clientecontrol;
use App\Http\Controllers\facturacioncontrol;
use App\Http\Controllers\propietariocontrol;
use App\Http\Controllers\logincontrol;
use App\Http\Controllers\categoriacontrol;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login


Route::get('/', function () {
    return view('login.login'); #carga por defecto la primera pagina es el welcome en la carpeta view
});
Route::get('login/login',[logincontrol::class,'login'])->name('login.login');
//rutas para el controlador usuario

Route::get('usuario/index',[usuariocontrol::class,'index'])->name('usuario.index');
Route::get('usuario/eliminar/{id}',[usuariocontrol::class,'eliminar'])->name('usuario.eliminar');

//rutas para propieatario
Route::get('propietario/index',[propietariocontrol::class,'index'])->name('propietario.index');
Route::post('propietario',[propietariocontrol::class,'registrar'])->name('propietario.registrar');
Route::get('propietario/eliminar/{id}',[propietariocontrol::class,'eliminar'])->name('propietario.eliminar');
Route::get('propietario/editar/{id}',[propietariocontrol::class,'editar'])->name('propietario.editar');
Route::post('propietario/actualizar',[propietariocontrol::class,'actualizar'])->name('propietario.actualizar');
//Route::get('usuario/editar','App\Http\Controllers\usuarioController@editar');
Route::get('inicio/inicio',[iniciocontrol::class,'inicio'])->name('inicio.index');

Route::get('cliente/animal',[clientecontrol::class,'animal']);
Route::get('cliente/propietario',[clientecontrol::class,'propietario']);

Route::get('cliente/nuevo',[clientecontrol::class,'nuevo'])->name('cliente.nuevo');

Route::post('cliente',[clientecontrol::class,'registrar'])->name('cliente.registrar');
Route::get('facturacion/caja',[facturacioncontrol::class,'caja']);
Route::get('facturacion/venta',[facturacioncontrol::class,'venta']);



Route::get('citas/citas',[citacontrol::class,'citas']);
Route::get('informe/informe',[informecontrol::class,'informe']);

Route::delete('cliente/{animal}',[clientecontrol::class,'eliminar'])->name('cliente.eliminar');

Route::get('cliente/editar/{animal}',[clientecontrol::class,'editar'])->name('cliente.editar');
Route::put('cliente/actualizar/{animal}',[clientecontrol::class,'actualizar'])->name('cliente.actualizar');

//----------------------------- rutas para categoria------------------
Route::get('producto/categoria',[categoriacontrol::class,'categoria'])->name('producto.categoria');
//ruta para actualizar
Route::post('producto/categoria',[categoriacontrol::class,'registrar'])->name('producto.registrar');
//ruta para eliminar
Route::get('producto/eliminar/{id}',[categoriacontrol::class,'eliminar'])->name('producto.eliminar');
//ruta para editar
Route::get('producto/editar/{id}',[categoriacontrol::class,'editar'])->name('producto.editar');
//ruta de actualizar  datos
Route::post('producto/actualizar',[categoriacontrol::class,'actualizar'])->name('producto.actualizar');

//----------------------------rutas para producto---------------------------------------
Route::get('producto/producto',[productocontrol::class,'producto'])->name('producto.producto');
//ruta para actualizar
Route::post('producto/producto',[productocontrol::class,'registrar'])->name('producto.registrar');
//ruta para eliminar
Route::get('producto/eliminar/{id}',[productocontrol::class,'eliminar'])->name('producto.eliminar');
//ruta para editar
Route::get('producto/editar/{id}',[productocontrol::class,'editar'])->name('producto.editar');
//ruta de actualizar  datos
Route::post('producto/actualizar',[productocontrol::class,'actualizar'])->name('producto.actualizar');
