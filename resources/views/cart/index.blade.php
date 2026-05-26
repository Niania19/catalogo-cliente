@extends('layouts.app')

@section('content')

<style>

    .cart-title{

        font-size:55px;

        font-weight:800;

        color:#081b3a;

        margin-bottom:15px;
    }

    .cart-subtitle{

        color:#666;

        font-size:20px;

        margin-bottom:50px;
    }

    .cart-card{

        background:white;

        border-radius:30px;

        padding:35px;

        box-shadow:0 15px 35px rgba(0,0,0,0.12);
    }

    .cart-item{

        padding:25px 0;

        border-bottom:1px solid #e5e7eb;
    }

    .cart-image{

        width:140px;

        height:110px;

        object-fit:cover;

        border-radius:20px;
    }

    .product-name{

        font-size:28px;

        font-weight:700;

        color:#081b3a;
    }

    .product-price{

        color:#d4af37;

        font-size:28px;

        font-weight:800;
    }

    .quantity-input{

        width:90px;

        border-radius:15px;

        border:1px solid #d1d5db;

        padding:10px;

        text-align:center;
    }

    .btn-update{

        background:#d4af37;

        color:black;

        border:none;

        padding:10px 18px;

        border-radius:15px;

        font-weight:700;

        transition:0.3s;
    }

    .btn-update:hover{

        background:#c49b22;
    }

    .btn-delete{

        background:#dc2626;

        color:white;

        border:none;

        padding:10px 18px;

        border-radius:15px;

        font-weight:700;

        transition:0.3s;
    }

    .btn-delete:hover{

        background:#b91c1c;
    }

    .summary-card{

        background:#081b3a;

        color:white;

        border-radius:30px;

        padding:35px;

        box-shadow:0 15px 35px rgba(0,0,0,0.15);

        position:sticky;

        top:120px;
    }

    .summary-title{

        font-size:32px;

        font-weight:800;

        margin-bottom:25px;
    }

    .summary-total{

        font-size:45px;

        font-weight:800;

        color:#d4af37;

        margin-bottom:35px;
    }

    .btn-checkout{

        width:100%;

        background:#d4af37;

        color:black;

        border:none;

        padding:18px;

        border-radius:50px;

        font-size:20px;

        font-weight:800;

        transition:0.3s;
    }

    .btn-checkout:hover{

        background:white;

        transform:translateY(-3px);
    }

    .empty-cart{

        background:white;

        border-radius:30px;

        padding:80px;

        text-align:center;

        box-shadow:0 15px 35px rgba(0,0,0,0.1);
    }

    .empty-cart h3{

        color:#081b3a;

        font-size:40px;

        font-weight:800;

        margin-bottom:20px;
    }

</style>

<div class="container py-5">

    <h1 class="cart-title">

        Carrito Premium

    </h1>

    <p class="cart-subtitle">

        Revisa tus reservas y servicios seleccionados.

    </p>

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if(session('cart'))

    @php
        $total = 0;
    @endphp

    <div class="row">

        <!-- PRODUCTOS -->

        <div class="col-lg-8">

            <div class="cart-card">

                @foreach(session('cart') as $id => $item)

                @php
                    $subtotal = $item['precio'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="cart-item">

                    <div class="row align-items-center">

                        <div class="col-md-3">

                            <img src="{{ $item['imagen'] }}"
                                 class="cart-image">

                        </div>

                        <div class="col-md-3">

                            <div class="product-name">

                                {{ $item['nombre'] }}

                            </div>

                            <div class="product-price">

                                ${{ number_format($item['precio'], 2) }}

                            </div>

                        </div>

                        <div class="col-md-3">

                            <form action="{{ route('cart.update') }}"
                                  method="POST">

                                @csrf

                                <input type="hidden"
                                       name="id"
                                       value="{{ $id }}">

                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       class="quantity-input mb-2">

                                <br>

                                <button class="btn-update">

                                    Actualizar

                                </button>

                            </form>

                        </div>

                        <div class="col-md-3 text-end">

                            <h4 class="fw-bold mb-3">

                                ${{ number_format($subtotal, 2) }}

                            </h4>

                            <form action="{{ route('cart.remove') }}"
                                  method="POST">

                                @csrf

                                <input type="hidden"
                                       name="id"
                                       value="{{ $id }}">

                                <button class="btn-delete">

                                    Eliminar

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        <!-- RESUMEN -->

        <div class="col-lg-4">

            <div class="summary-card">

                <h3 class="summary-title">

                    Resumen

                </h3>

                <div class="summary-total">

                    ${{ number_format($total, 2) }}

                </div>

                <form action="/orders"
                      method="POST">

                    @csrf

                    <button type="submit"
                            class="btn-checkout">

                        Crear Pedido

                    </button>

                </form>

            </div>

        </div>

    </div>

    @else

    <div class="empty-cart">

        <h3>

            Tu carrito está vacío

        </h3>

        <p class="text-muted fs-5 mb-4">

            Explora nuestras habitaciones premium.

        </p>

        <a href="/productos"
           class="btn btn-dark btn-lg rounded-pill px-5">

            Ver Habitaciones

        </a>

    </div>

    @endif

</div>

@endsection