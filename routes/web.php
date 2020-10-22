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
use App\Http\Controllers\mascotacontrol;
use App\Http\Controllers\perfilcontrol;
use App\Http\Controllers\ventacontrol;

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
Route::get('inicio/inicio',[iniciocontrol::class,'inicio'])->name('inicio.inicio');
//rutas para el usuario

//rutas para el controlador usuario
//-------------------rutas para el usuario-------------------------------------------------
Route::get('usuario/index',[usuariocontrol::class,'index'])->name('usuario.index');
Route::get('usuario/eliminar/{id}',[usuariocontrol::class,'eliminar'])->name('usuario.eliminar');
//ruta para registar
Route::post('usuario/index',[usuariocontrol::class,'registrar'])->name('usuario.registrar');
//ruta para editar
Route::get('usuario/editar/{id}',[usuariocontrol::class,'editar'])->name('usuario.editar');
//ruta de actualizar  datos
Route::post('usuario/actualizar',[usuariocontrol::class,'actualizar'])->name('usuario.actualizar');


//rutas para propietario
Route::get('propietario/index',[propietariocontrol::class,'index'])->name('propietario.index');
Route::post('propietario',[propietariocontrol::class,'registrar'])->name('propietario.registrar');
Route::get('propietario/eliminar/{id}',[propietariocontrol::class,'eliminar'])->name('propietario.eliminar');
Route::get('propietario/editar/{id}',[propietariocontrol::class,'editar'])->name('propietario.editar');
Route::post('propietario/actualizar',[propietariocontrol::class,'actualizar'])->name('propietario.actualizar');
//Route::get('usuario/editar','App\Http\Controllers\usuarioController@editar');


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
Route::post('producto/categoria',[categoriacontrol::class,'registrar'])->name('categoria.registrar');
//ruta para eliminar
Route::get('producto/categoria/eliminar/{id}',[categoriacontrol::class,'eliminar'])->name('categoria.eliminar');
//ruta para editar
Route::get('producto/categoria/editar/{id}',[categoriacontrol::class,'editar'])->name('categoria.editar');
//ruta de actualizar  datos
Route::post('producto/categoria/actualizar',[categoriacontrol::class,'actualizar'])->name('categoria.actualizar');

//----------------------------rutas para producto---------------------------------------
Route::get('producto/producto',[productocontrol::class,'producto'])->name('producto.producto');
//ruta para nuevo
Route::post('producto',[productocontrol::class,'registrar'])->name('producto.registrar');
//ruta para eliminar
Route::get('producto/eliminar/{id}',[productocontrol::class,'eliminar'])->name('producto.eliminar');
//ruta para editar
Route::get('producto/editar/{id}',[productocontrol::class,'editar'])->name('producto.editar');
//ruta de actualizar  datos
Route::post('producto/actualizar',[productocontrol::class,'actualizar'])->name('producto.actualizar');

/***************RUTAS DE MASCOTA***************/

Route::get('mascota/index',[mascotacontrol::class,'index'])->name('mascota.index');
Route::get('mascota/lista/',[mascotacontrol::class,'lista'])->name('mascota.lista');
Route::get('mascota/buscar/{dni}',[mascotacontrol::class,'buscar'])->name('propietario.buscar');
Route::get('mascota/eliminar/{id}',[mascotacontrol::class,'eliminar'])->name('producto.eliminar');
Route::post('mascota',[mascotacontrol::class,'registrar'])->name('mascota.registrar');
Route::get('mascota/editar/{id}',[mascotacontrol::class,'editar'])->name('mascota.editar');
Route::post('mascota/actualizar',[mascotacontrol::class,'actualizar'])->name('mascota.actualizar');
//----------------------------rutas para perfil---------------------------------------
Route::get('perfil/perfil',[perfilcontrol::class,'perfil'])->name('perfil.perfil');
//ruta para actualizar
Route::post('perfil/perfil',[perfilcontrol::class,'registrar'])->name('perfil.registrar');
//ruta para eliminar
Route::get('perfil/eliminar/{id}',[perfilcontrol::class,'eliminar'])->name('perfil.eliminar');
//ruta para editar
Route::get('perfil/editar/{id}',[perfilcontrol::class,'editar'])->name('perfil.editar');
//ruta de actualizar  datos
Route::post('perfil/actualizar',[perfilcontrol::class,'actualizar'])->name('perfil.actualizar');

//-----------------rutas para ventas------------------------------------------------
Route::get('venta/index',[ventacontrol::class,'index'])->name('venta.index');
