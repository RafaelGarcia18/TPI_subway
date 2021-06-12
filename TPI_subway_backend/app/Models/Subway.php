<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subway extends Model
{
    use HasFactory;

    protected $table = 'subways';

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function tipoPan(){
        return $this->belongsTo(TipoPan::class,'pan_id','id');
    }

    public function tipoQueso(){
        return $this->belongsTo(TipoQueso::class,'queso_id','id');
    }

    public function tipoCarne(){
        return $this->belongsTo(TipoCarne::class,'carne_id','id');
    }

    public function tipoAdereso(){
        //primero el nombre de la tabla pivote, despues la llave foranea de la clase actual y despues la llave foranea de la otra tabla
        return $this->belongsToMany(TipoAdereso::class,'adereso_subways','subway_id','adereso_id');
    }
    public function tipoVegetal(){
        return $this->belongsToMany(TipoVegetal::class,'vegetal_subways','subway_id','vegetal_id');
    }

    public function orden(){
        return $this->hasMany(Orden::class,'subway_id','id');
    }
}
