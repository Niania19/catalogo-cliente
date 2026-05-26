<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    private $api = 'https://apihotel21-production.up.railway.app/api/productos';

    public function index()
    {
        try {

            $response = Http::get($this->api);

            if (!$response->successful()) {

                return back()->with(
                    'error',
                    'No se pudieron cargar los productos'
                );
            }

            $productos = $response->json();

            return view(
                'productos.index',
                compact('productos')
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Error de conexión: ' . $e->getMessage()
            );
        }
    }

    public function show($id)
    {
        try {

            $response = Http::get($this->api . '/' . $id);

            if (!$response->successful()) {

                return back()->with(
                    'error',
                    'Producto no encontrado'
                );
            }

            $producto = $response->json();

            return view(
                'productos.show',
                compact('producto')
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Error de conexión: ' . $e->getMessage()
            );
        }
    }
}