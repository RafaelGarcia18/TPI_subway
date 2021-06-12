<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function editInfo(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_nacimiento' => ['required'],
            'telefono' => ['required'],
        ]);
        $user = User::findOrFail($id);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->telefono = $request->telefono;
        $user->save();
        return response()->json('Cambios Guardados', 200);
    }
    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'email' => ['required'],
            'oldPassword' => ['required'],
            'newPassword' => ['required'],
        ]);
        $user = $user = User::findOrFail($id);
        if (Hash::check($request->oldPassword, $user->password) && $user->email == $request->email) {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return response()->json('Contraseña cambiada con exito', 200);
        } else {
            return response()->json('These credentials do not match our records.', 401);
        }
    }
}
