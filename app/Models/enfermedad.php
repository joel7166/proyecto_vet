<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent\Model;

class enfermedad extends Model
{
   protected $table="enfermedades";

   protected $fillable=['enf_id','enf_nomre','enf_descripcion'];

   public $timestamps=false;
}