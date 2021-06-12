<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Direccion;

class AddressController extends Controller
{
    //
    public function getAllAddress($id)
    {
        $direcciones = Direccion::where('user_id', $id)->get();
        return $direcciones;
    }

    public function getAddress($id)
    {
        $direccion = Direccion::findOrFail($id);
        if ($direccion->user_id == Auth::user()->id) {
            return $direccion;
        } else {
            abort(403, 'La direccion a editar no pertenece al usuario de la sesion');
        }
    }
    public function newAddress(Request $request)
    {
        $request->validate([
            'etiqueta' => ['required'],
            'num_casa' => ['required'],
            'user_id' => ['required',]
        ]);
        $newAddress = new Direccion;
        $newAddress->etiqueta = $request->etiqueta;
        $newAddress->pais = $request->pais;
        $newAddress->departamento = $request->departamento;
        $newAddress->municipio = $request->municipio;
        $newAddress->colonia = $request->colonia;
        $newAddress->calle_avenida = $request->calle;
        $newAddress->codigo_postal = $request->codigoPostal;
        $newAddress->latitud = $request->lat;
        $newAddress->longitud = $request->lng;
        $newAddress->num_casa = $request->num_casa;
        $newAddress->referencias = $request->referencias;
        $newAddress->user_id = $request->user_id;

        $newAddress->save();
        return response()->json("Direccion guardada corectamente", 200);
    }
    public function saveAddress(Request $request, $id)
    {
        $request->validate([
            'etiqueta' => ['required'],
            'num_casa' => ['required'],
            'user_id' => ['required',],
        ]);
        $direccion = Direccion::findOrFail($id);
        if ($direccion->user_id == Auth::user()->id) {
            $direccion->etiqueta = $request->etiqueta;
            $direccion->pais = $request->pais;
            $direccion->departamento = $request->departamento;
            $direccion->municipio = $request->municipio;
            $direccion->colonia = $request->colonia;
            $direccion->calle_avenida = $request->calle;
            $direccion->codigo_postal = $request->codigoPostal;
            $direccion->latitud = $request->lat;
            $direccion->longitud = $request->lng;
            $direccion->num_casa = $request->num_casa;
            $direccion->referencias = $request->referencias;
            $direccion->save();
            return response()->json('Direccion editada correctamente', 200);
        } else {
            abort(403, 'La direccion a editar no pertenece al usuario de la sesion');
        }
    }
    public function deleteAddress($id)
    {
        $direccion = Direccion::findOrFail($id);
        if ($direccion->user_id == Auth::user()->id) {
            $direccion->delete();
            return response()->json('Direccion eliminada correctamente', 200);
        } else {
            abort(403, 'La direccion a editar no pertenece al usuario de la sesion');
        }
    }
}
