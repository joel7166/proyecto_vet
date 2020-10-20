<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class animal extends Model
{
   protected $table="animal";

   protected $fillable=['pro_id','ani_nombre',
   'ani_especie','ani_raza','ani_color',
   'ani_fecha_nacimiento','ani_genero'];

   public $timestamps=false;
}