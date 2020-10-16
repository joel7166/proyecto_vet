<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class propietario extends Model
{
   protected $table="propietario";

   protected $fillable=['pro_dni','pro_nombre',
   'pro_apellidos','pro_telefono','pro_email',
   'pro_direccion','pro_ciudad'];

   public $timestamps=false;
}