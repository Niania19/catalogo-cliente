<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClienteAuthController extends Controller
{
    private $api = 'https://apihotel21-production.up.railway.app/api';

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post(
            $this->api . '/cliente/register',
            [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'pais' => $request->pais,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ]
        );

        $data = $response->json();

        if ($response->successful()) {

            session([
                'usuario' => $data['cliente']
            ]);

            return redirect()->route('login')
                ->with(
                    'success',
                    'Registro exitoso. Inicia sesión.'
                );
        }

        return back()->withErrors([
            'error' => $data['mensaje']
                ?? 'Error al registrarse'
        ]);
    }

    public function login(Request $request)
    {
        $response = Http::post(
            $this->api . '/cliente/login',
            [
                'correo' => $request->correo,
                'password' => $request->password
            ]
        );

        $data = $response->json();

        if ($response->successful()) {

            session([
                'token' => $data['token'],
                'usuario' => $data['cliente']
            ]);

            return redirect()->route('perfil');
        }

        return back()->withErrors([
            'error' => $data['mensaje']
                ?? 'Credenciales incorrectas'
        ]);
    }

    public function perfil()
    {
        if (!session()->has('usuario')) {

            return redirect()->route('login');
        }

        $usuario = session('usuario');
        $token = session('token');

        $userId = $usuario['id_cliente'];

        try {

            $response = Http::withToken($token)
                ->get($this->api . "/orders/{$userId}");

            $orders = $response->successful()
                ? $response->json()
                : [];

        } catch (\Exception $e) {

            $orders = [];
        }

        return view(
            'profile.index',
            compact('usuario', 'orders')
        );
    }

    public function logout()
    {
        if (session()->has('token')) {

            Http::withToken(session('token'))
                ->post($this->api . '/cliente/logout');
        }

        session()->forget([
            'token',
            'usuario'
        ]);

        return redirect('/')
            ->with(
                'success',
                'Sesión cerrada correctamente'
            );
    }
}