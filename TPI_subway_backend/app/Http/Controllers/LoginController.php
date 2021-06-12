<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request) //hace login
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(["user"=>Auth::user()], 201);
        }else{
            return response()->json('These credentials do not match our records.', 401);
        }
    }

    public function logout(Request $request)
    { //hace logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json('Logout succes.', 200);
    }



    public function register(Request $request)
    {
        if (User::where('email', $request->email)->count() > 0) {
            return response()->json(['message'=>'The email is already in use.'], 500);
        } else {
            $user = new User();
            $user->email = $request->email;
            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->telefono = $request->telefono;
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->password = Hash::make($request->password);

            $user->save();
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            return response()->json(["user"=>Auth::user()], 201);
        }
    }

    public function currentUser(){
        if(Auth::user())
        return Auth::user();
        else
        return response()->json('No session actve.', 404);
    }
}
