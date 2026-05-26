<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderWebController extends Controller
{
    // 🔒 Validación de sesión reutilizable
    private function checkSession()
    {
        if (!session()->has('token') || !session()->has('usuario')) {
            return redirect('/login')->with('error', 'Debes iniciar sesión primero');
        }
        return null;
    }

    // 📦 LISTAR PEDIDOS
    public function index()
    {
        if ($redirect = $this->checkSession()) return $redirect;

        $token = session('token');
        $usuario = session('usuario');
        $userId = $usuario['id_cliente'] ?? $usuario['id'];

        $response = Http::withToken($token)
            ->get("http://127.0.0.1:8000/api/orders/$userId");

        if (!$response->successful()) {
            return redirect('/carrito')->with('error', 'No se pudieron cargar los pedidos');
        }

        $orders = $response->json(); 
        return view('orders.index', compact('orders'));
    }

    // 📄 VER DETALLE DE PEDIDO
    public function show($orderId)
    {
        if ($redirect = $this->checkSession()) return $redirect;

        $usuario = session('usuario');
        $token = session('token');
        $userId = $usuario['id_cliente'] ?? $usuario['id'];

        $response = Http::withToken($token)
            ->get("http://127.0.0.1:8000/api/orders/{$userId}/{$orderId}");

        if ($response->failed()) {
            return redirect()->route('perfil')->with('error', 'No se pudo obtener el detalle del pedido.');
        }

        $order = $response->json();

        if (!isset($order['id'])) {
            return redirect()->route('perfil')->with('error', 'El pedido no existe.');
        }

        return view('orders.show', compact('order'));
    }

    // ❌ CANCELAR PEDIDO
   public function cancel($orderId)
{
    $usuario = session('usuario');
    $token = session('token');
    $userId = $usuario['id_cliente'] ?? $usuario['id'];

    $response = Http::withToken($token)
        ->put("http://127.0.0.1:8000/api/orders/{$userId}/{$orderId}/cancel");

    // SI NO ES EXITOSO, MOSTRAR EL ERROR REAL DE PHP
    if (!$response->successful()) {
        return response($response->body()); // Esto abrirá una pantalla blanca con el error real
    }

    return redirect()->route('perfil')->with('success', 'Pedido cancelado.');
}

    // 🛒 CREAR PEDIDO
    public function store()
    {
        if ($redirect = $this->checkSession()) return $redirect;

        $token = session('token');
        $usuario = session('usuario');
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'El carrito está vacío');
        }

        $userId = $usuario['id_cliente'] ?? $usuario['id'];
        $items = [];

        foreach ($cart as $id => $item) {
            $items[] = [
                'product_id' => (int) $id,
                'quantity'   => (int) $item['quantity'],
                'price'      => (float) ($item['precio'] ?? $item['price'] ?? 0)
            ];
        }

        try {
            $response = Http::withToken($token)
                ->post('http://127.0.0.1:8000/api/orders', [
                    'user_id' => $userId, 
                    'items' => $items
                ]);

            if (!$response->successful()) {
                dd(['Codigo_Error'=>$response->status(),
                'Respuesta_API'=>$response->body(),
                'URL_Consulta'=>"http://127.0.0.1:8000/api/orders/{userID}/{orderID}/cancel"]);
                $mensaje = $response->json()['message'] ?? 'Error en la API al crear el pedido';
                return redirect()->back()->with('error', $mensaje);
            }

            session()->forget('cart');

            return redirect()->route('perfil')
                ->with('success', '¡Pedido creado con éxito! El stock ha sido actualizado.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Conexión fallida: ' . $e->getMessage());
        }
    }
} // Esta es la llave que cierra la clase