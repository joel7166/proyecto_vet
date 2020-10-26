<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class medico extends Model
{
   protected $table="medico";

   protected $fillable=['med_dni','med_nombre',
   'med_apellidos','med_telefono','med_email',
   'med_genero','med_fecha_nacimiento'];

   public $timestamps=false;
}