<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class atencionmedica extends Model
{
    protected $table="enfermedades";
    protected $fillable=[
     'enf_nombre','enf_descripcion'
    ];
    public $timestamps=false;

}
