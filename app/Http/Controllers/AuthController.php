<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function login (Request $request)
    {
        $auth = false;
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $auth = true; // Success
        }

        return response()->json([
            'exito' => $auth,
            'data' => $auth ? 'Inicio de sesión exitoso.' : 'Credenciales inválidas.'
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return response()->json([
                'exito' => true,
                'data' => 'Cierre de sesión exitoso.'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'exito' => true,
                'data' => 'Algo ha ocurrido ...'
            ]);
        }
    }

    public function registro (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'         => 'required|string|unique:users|email|max:255',
            'password'   => 'required|string|max:255|min:8',
            'passconfirm'   => 'required|string|max:255|min:8',
        ],[
            'name.required' => 'El nombre es requerido.',
            'email.required' => 'El correo es requerido.',
            'email.unique' => 'El correo ya se encuentra registrado.',
            'password.min' => 'La contraseña debe ser mínimo de 8 caracteres.',
            'passconfirm.min' => 'La confirmación contraseña debe ser mínimo de 8 caracteres.',
        ]);

        if ( $validator->fails() ) {
            return response()->json(['exito' => false, 'data' => $validator->errors()->first()]);
        }

        if ($request->password !== $request->passconfirm) {
            return response()->json(['exito' => false, 'data' => 'Las contraseñas no coinciden.']);
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        if ($user->save()) {
            return response()->json([
                'exito' => true,
                'data' => 'Usuario registrado exitosamente. Sera redireccionado a la vista de Iniciar Sesión ...'
            ]);
        } else {
            return response()->json(['exito' => false, 'data' => 'Algo ha ocurrido, intente nuevamente.']);
        }
    }
}
