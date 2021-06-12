<?php

namespace App\Http\Controllers;

use App\Models\TipoAdereso;
use Illuminate\Http\Request;

class AderesoController extends Controller
{
    public function all(){
        return response()->json(TipoAdereso::all());
    }
}
