<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    private $api = 'https://apihotel21-production.up.railway.app/api/productos';

    public function index()
    {
        $response = Http::get($this->api);

        $productos = $response->json();

        return view('productos.index', compact('productos'));
    }

    public function show($id)
    {
        $response = Http::get($this->api . '/' . $id);

        $producto = $response->json();

        return view('productos.show', compact('producto'));
    }
}