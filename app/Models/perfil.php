<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class perfil extends Model
{
    protected $table="perfil";
    protected $primaryKey='per_id';
    protected $fillable=[
     'per_id','per_nombre','per_descripcion'
    ];
    public $timestamps=false;

}
