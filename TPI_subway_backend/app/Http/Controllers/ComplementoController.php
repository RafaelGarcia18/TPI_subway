<?php

namespace App\Http\Controllers;

use App\Models\Complemento;
use Illuminate\Http\Request;

class ComplementoController extends Controller
{
    public function all(){
        return response()->json(Complemento::all());
    }
}
