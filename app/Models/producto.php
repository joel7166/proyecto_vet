<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class producto extends Model
{
    protected $table="producto";
    protected $fillable=[
     'catp_id','prod_codigo','prod_nombre','prod_stock','prod_descripcion'
    ];
    public $timestamps=false;

}
