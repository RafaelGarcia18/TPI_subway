<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Orden;
use App\Models\Subway;
use App\Models\TipoAdereso;
use App\Models\TipoVegetal;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        //validamos
        $request->validate([
            'ordenes' => 'required',
            'direccion' => 'required',
            'nombre_contacto'=>'required',
            'telefono_contacto'=>'required',
            'correo_contacto'=>'required',
        ]);

        //creamos la transaccion
        DB::transaction(function () use ($request) {
            //creamos una factura y le asignamos la direccion
            $factura = new Factura();
            $factura->direccion_id = $request->input('direccion.id');
            $factura->nombre_contacto = $request->input('nombre_contacto');
            $factura->telefono_contacto = $request->input('telefono_contacto');
            $factura->correo_contacto = $request->input('correo_contacto');
            if($request->input('indicaciones')){
                $factura->indicaciones = $request->input('indicaciones');
            }
            $factura->save();
            //obtenemos un array asociativo de ordenes del request y lo recorremos
            $ordenes = $request->input('ordenes');
            for ($i = 0; $i < count($ordenes); $i++) {
                //creamos un subway por cada orden y le asignamos los valores
                $subway = new Subway();
                $subway->user_id = $request->input('direccion.user_id');
                $subway->pan_id = $ordenes[$i]['pan']['id'];
                $subway->queso_id = $ordenes[$i]['queso']['id'];
                $subway->carne_id = $ordenes[$i]['carne']['id'];
                $subway->save();
                //recorremos el array de aderesos y vegetales y los añadimos
                for ($j = 0; $j < count($ordenes[$i]["aderesos"]); $j++) {
                    $adereso = TipoAdereso::find($ordenes[$i]["aderesos"][$j]["id"]);
                    $subway->tipoAdereso()->attach($adereso);
                }

                for ($j = 0; $j < count($ordenes[$i]["vegetales"]); $j++) {
                    $vegetal = TipoVegetal::find($ordenes[$i]["vegetales"][$j]["id"]);
                    $subway->tipoVegetal()->attach($vegetal);
                }

                //creamos una orden por cada subway y le añadimos el complemento si existe
                $newOrden = new Orden();
                if ($ordenes[$i]['complemento']) {
                    $newOrden->complemento_id = $ordenes[$i]['complemento']["id"];
                }
                $newOrden->subway_id = $subway->id;
                $newOrden->cantidad = $ordenes[$i]["cantidad"];
                $newOrden->factura_id = $factura->id;
                $newOrden->save();
            }
        });
        return response()->json("Pedido realizado con exito", 200);
    }
}
