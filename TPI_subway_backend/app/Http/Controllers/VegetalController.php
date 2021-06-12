<?php

namespace App\Http\Controllers;

use App\Models\TipoVegetal;
use Illuminate\Http\Request;

class VegetalController extends Controller
{
    public function all(){
        return response()->json(TipoVegetal::all());
    }
}
