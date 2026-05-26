<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\OrderWebController;
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| Páginas públicas
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.inicio');

Route::view('/nosotros', 'pages.nosotros');

Route::view('/contacto', 'pages.contacto');


/*
|--------------------------------------------------------------------------
| Productos (Catálogo público)
|--------------------------------------------------------------------------
*/

Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/productos/{id}', [ProductoController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Carrito público
|--------------------------------------------------------------------------
*/

Route::get('/carrito', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/carrito/agregar', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/carrito/actualizar', [CartController::class, 'update'])
    ->name('cart.update');

Route::post('/carrito/eliminar', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/carrito/vaciar', [CartController::class, 'clear'])
    ->name('cart.clear');



// 1. Primero las que ejecutan acciones específicas (POST)
Route::post('/orders/{id}/cancel', [OrderWebController::class, 'cancel'])->name('orders.cancel');
Route::post('/orders', [OrderWebController::class, 'store'])->name('orders.store');

// 2. Después las que solo muestran información (GET)
Route::get('/orders', [OrderWebController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderWebController::class, 'show'])->name('orders.show');





/*
|--------------------------------------------------------------------------
| Autenticación Cliente
|--------------------------------------------------------------------------
*/

Route::get('/login', [ClienteAuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [ClienteAuthController::class, 'login']);

Route::get('/register', [ClienteAuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [ClienteAuthController::class, 'register']);

Route::post('/logout', [ClienteAuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Perfil del usuario
|--------------------------------------------------------------------------
*/

Route::get('/perfil', [ClienteAuthController::class, 'perfil'])
    ->name('perfil');

Route::put('/perfil', [ClienteAuthController::class, 'updateProfile'])
    ->name('perfil.update');

Route::put('/perfil/password', [ClienteAuthController::class, 'changePassword'])
    ->name('perfil.password');




    
    Route::get('/payment/{orderId}',
    [PaymentController::class, 'pay'])
    ->name('payment.pay');

Route::get('/payment/success/{orderId}',
    [PaymentController::class, 'success']);

Route::get('/payment/cancel',
    [PaymentController::class, 'cancel']);