<?php

namespace App\Http\Controllers;

use App\Models\TipoPan;
use Illuminate\Http\Request;

class PanController extends Controller
{
    public function all(){
        return response()->json(TipoPan::all());
    }
}
