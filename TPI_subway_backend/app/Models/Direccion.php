<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;


    public function factura(){
        return $this->hasMany(Factura::class,'direccion_id','id');
    }

    public function user(){
        //user_id es la llave foranea que hace referencia al id de la tabla user
        //id es la primary key de Complemento
        return $this->belongsTo(User::class,'user_id','id');
    }
}
