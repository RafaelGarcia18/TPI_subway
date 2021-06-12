<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaController extends Controller
{
    public function getPayments(Request $request, $id)
    {
        if (Auth::user() != null && Auth::user()->id == $id) {
            $facturas = Factura::query();
            $facturas->whereHas('orden', function ($query) use ($id) {
                $query->whereHas('subway', function ($query) use ($id) {
                    $query->where('user_id', $id);
                });
            })->with(
                'orden',
                'direccion',
                'orden.complemento',
                'orden.subway',
                'orden.subway.tipoCarne',
                'orden.subway.tipoPan',
                'orden.subway.tipoQueso',
                'orden.subway.tipoAdereso',
                'orden.subway.tipoVegetal'
            );
            if ($request->get('fechaIni')) {
                $facturas->whereDate('created_at', '>=', $request->get('fechaIni'));
            }
            if ($request->get('fechaFin')) {
                $facturas->whereDate('created_at', '<=', $request->get('fechaFin'));
            }
            $facturas->orderBy('created_at', $request->get('orderBy'));
            return $facturas->paginate(5);
        } else {
            abort(403, "EL id del usuario no corresponde el id de la sesion");
        }
    }
}
