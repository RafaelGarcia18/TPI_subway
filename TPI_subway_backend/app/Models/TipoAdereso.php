<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAdereso extends Model
{
    use HasFactory;

    public function subways(){
        return $this->belongsToMany(Subway::class,'adereso_subways','adereso_id','subway_id');
    }
}
