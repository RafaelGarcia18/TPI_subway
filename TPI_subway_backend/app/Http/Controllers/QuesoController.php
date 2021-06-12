<?php

namespace App\Http\Controllers;

use App\Models\TipoQueso;
use Illuminate\Http\Request;

class QuesoController extends Controller
{
    public function all(){
        return response()->json(TipoQueso::all());
    }
}
