<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class detalleventa extends Model
{
   protected $table="detalle_venta";

   protected $fillable=['ven_id','prod_id',
   'detv_cantidad','detv_precio_venta','detv_descuento'];

   public $timestamps=false;
}
