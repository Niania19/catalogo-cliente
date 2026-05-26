<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    private $api = 'http://127.0.0.1:8000/api/productos';

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