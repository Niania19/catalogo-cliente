@extends('layouts.app')

@section('content')

<style>

    .catalog-title{

        font-size:55px;

        font-weight:800;

        color:#081b3a;

        text-align:center;

        margin-bottom:15px;
    }

    .catalog-subtitle{

        text-align:center;

        color:#666;

        font-size:20px;

        margin-bottom:60px;
    }

    .hotel-card{

        background:white;

        border:none;

        border-radius:28px;

        overflow:hidden;

        transition:0.4s;

        box-shadow:0 10px 30px rgba(0,0,0,0.12);

        height:100%;
    }

    .hotel-card:hover{

        transform:translateY(-12px);

        box-shadow:0 20px 40px rgba(0,0,0,0.18);
    }

    .hotel-image{

        height:280px;

        width:100%;

        object-fit:cover;

        transition:0.5s;
    }

    .hotel-card:hover .hotel-image{

        transform:scale(1.05);
    }

    .hotel-body{

        padding:30px;
    }

    .hotel-name{

        font-size:28px;

        font-weight:700;

        color:#081b3a;

        margin-bottom:15px;
    }

    .hotel-price{

        color:#d4af37;

        font-size:34px;

        font-weight:800;

        margin-bottom:15px;
    }

    .hotel-stock{

        color:#666;

        margin-bottom:25px;

        font-size:17px;
    }

    .btn-luxury{

        background:#081b3a;

        color:white;

        border:none;

        padding:14px 30px;

        border-radius:40px;

        font-weight:700;

        transition:0.3s;

        text-decoration:none;

        display:inline-block;
    }

    .btn-luxury:hover{

        background:#d4af37;

        color:black;

        transform:translateY(-3px);
    }

    .premium-badge{

        position:absolute;

        top:20px;

        right:20px;

        background:#d4af37;

        color:black;

        padding:10px 18px;

        border-radius:30px;

        font-size:14px;

        font-weight:bold;

        z-index:10;
    }

    .image-container{

        position:relative;

        overflow:hidden;
    }

</style>

@php

$imagenes = [

'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070',

'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=2070',

'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=2074',

'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?q=80&w=2070',

'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=2070',

'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=2070'

];

@endphp

<div class="container py-5">

    <h1 class="catalog-title">

        Habitaciones & Suites Premium

    </h1>

    <p class="catalog-subtitle">

        Descubre lujo, comodidad y experiencias exclusivas.

    </p>

    <div class="row g-4">

        @foreach($productos as $index => $producto)

        <div class="col-lg-4 col-md-6">

            <div class="hotel-card">

                <div class="image-container">

                    <div class="premium-badge">

                        Premium

                    </div>

                    <img src="{{ $imagenes[$index % count($imagenes)] }}"
                         class="hotel-image">

                </div>

                <div class="hotel-body">

                    <h3 class="hotel-name">

                        {{ $producto['nombre'] }}

                    </h3>

                    <div class="hotel-price">

                        ${{ number_format($producto['precio'], 2) }}

                    </div>

                    <div class="hotel-stock">

                        Disponibles:
                        <strong>
                            {{ $producto['stock'] }}
                        </strong>

                    </div>

                    <a href="/productos/{{ $producto['id'] }}"
                       class="btn-luxury">

                        Ver Detalle

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection