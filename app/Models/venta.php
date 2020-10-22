<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class venta extends Model
{
   protected $table="venta";

   protected $fillable=['usu_id','pro_id',
   'ven_numero_comprobante','ven_tipo_comprobante','ven_fecha_hora',
   'ven_impuesto','ven_total_venta'];

   public $timestamps=false;
}
