<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class logincontrol extends Controller
{
 public function login(){
     return view('login.login');
 }
public function editar(){

    return view('usuario.editar');
}

}
