<?php

namespace App\Http\Controllers;

use App\Models\TipoCarne;
use Illuminate\Http\Request;

class CarneController extends Controller
{
    public function all(){
        return response()->json(TipoCarne::all());
    }
}
