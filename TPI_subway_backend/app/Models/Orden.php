<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    public function factura(){
        return $this->belongsTo(Factura::class,'factura_id','id');
    }

    public function subway(){
        return $this->belongsTo(Subway::class,'subway_id','id');
    }

    public function complemento(){
        return $this->belongsTo(Complemento::class,'complemento_id','id');
    }
}
