<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class categoria extends Model
{
    protected $table="categoria_prod";
    protected $fillable=[
     'catp_nombre','catp_descripcion'
    ];
    public $timestamps=false;

}
