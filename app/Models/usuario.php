<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class animal extends Model
{
   protected $table="usuario";

   protected $fillable=['usu_id','per_id','usu_dni',
   'usu_email','usu_contraseña','usu_nombres',
   'usu_apellidos','usu_celular','usu_estado'];

   public $timestamps=false;
}
