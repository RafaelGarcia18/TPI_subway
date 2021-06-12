<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complemento extends Model
{
    use HasFactory;

    public function orden(){
        //complemento_id es la llave foranea en la tabla orden que hace referencia al id de complemento,
        //id es la primary key de Complemento
        return $this->hasMany(Orden::class,'complemento_id','id');
    }
}
