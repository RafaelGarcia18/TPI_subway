<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public function orden(){
        return $this->hasMany(Orden::class,'factura_id','id');
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class,'direccion_id','id');
    }
}
