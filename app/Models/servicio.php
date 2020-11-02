<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class servicio extends Model
{
    protected $table="servicios";
    protected $fillable=[
     'ser_id','ser_nombre','ser_precio'
    ];
    public $timestamps=false;

}
