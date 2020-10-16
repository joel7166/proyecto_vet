<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class facturacioncontrol extends Controller
{
 public function caja(){
     return view('facturacion.caja');
 }
public function venta(){

    return view('facturacion.venta');
}

}