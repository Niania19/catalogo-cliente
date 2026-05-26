@extends('layouts.app')

@section('content')

<style>

    .detail-container{

        padding:60px 0;
    }

    .detail-card{

        background:white;

        border-radius:35px;

        overflow:hidden;

        box-shadow:0 15px 40px rgba(0,0,0,0.15);
    }

    .detail-image{

        width:100%;

        height:100%;

        min-height:650px;

        object-fit:cover;
    }

    .detail-content{

        padding:60px;
    }

    .premium-badge{

        background:#d4af37;

        color:black;

        padding:10px 20px;

        border-radius:30px;

        font-weight:700;

        display:inline-block;

        margin-bottom:25px;
    }

    .detail-title{

        font-size:58px;

        font-weight:800;

        color:#081b3a;

        margin-bottom:25px;
    }

    .detail-description{

        font-size:20px;

        color:#666;

        line-height:1.8;

        margin-bottom:40px;
    }

    .detail-price{

        font-size:52px;

        font-weight:800;

        color:#d4af37;

        margin-bottom:20px;
    }

    .detail-stock{

        font-size:22px;

        color:#444;

        margin-bottom:40px;
    }

    .detail-stock span{

        color:#16a34a;

        font-weight:bold;
    }

    .btn-luxury{

        background:#081b3a;

        color:white;

        border:none;

        padding:18px 40px;

        border-radius:50px;

        font-size:18px;

        font-weight:700;

        transition:0.3s;
    }

    .btn-luxury:hover{

        background:#d4af37;

        color:black;

        transform:translateY(-3px);
    }

    .btn-back{

        background:#e5e7eb;

        color:#111827;

        border:none;

        padding:18px 40px;

        border-radius:50px;

        font-size:18px;

        font-weight:700;

        margin-left:15px;

        transition:0.3s;
    }

    .btn-back:hover{

        background:#d1d5db;
    }

    @media(max-width:992px){

        .detail-image{

            min-height:400px;
        }

        .detail-title{

            font-size:42px;
        }

        .detail-content{

            padding:35px;
        }

    }

</style>

<div class="container detail-container">

    <div class="detail-card">

        <div class="row g-0">

            <!-- IMAGEN -->

            <div class="col-lg-6">

                @if($producto['imagen_url'])

                    <img src="{{ $producto['imagen_url'] }}"
                         class="detail-image">

                @else

                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070"
                         class="detail-image">

                @endif

            </div>

            <!-- INFORMACIÓN -->

            <div class="col-lg-6 d-flex align-items-center">

                <div class="detail-content">

                    <div class="premium-badge">

                        Premium Suite

                    </div>

                    <h1 class="detail-title">

                        {{ $producto['nombre'] }}

                    </h1>

                    <p class="detail-description">

                        Vive una experiencia única en nuestras
                        habitaciones premium con lujo, elegancia,
                        comodidad y servicios exclusivos diseñados
                        para brindarte una estancia inolvidable.

                    </p>

                    <div class="detail-price">

                        ${{ number_format($producto['precio'], 2) }}

                    </div>

                    <div class="detail-stock">

                        Disponibles:
                        <span>

                            {{ $producto['stock'] }}

                        </span>

                    </div>

                    <!-- BOTONES -->

                    <div class="d-flex flex-wrap">

                        <form action="{{ route('cart.add') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="id"
                                   value="{{ $producto['id'] }}">

                            <input type="hidden"
                                   name="nombre"
                                   value="{{ $producto['nombre'] }}">

                            <input type="hidden"
                                   name="precio"
                                   value="{{ $producto['precio'] }}">

                            <input type="hidden"
                                   name="imagen"
                                   value="{{ $producto['imagen_url'] }}">

                            <button type="submit"
                                    class="btn btn-luxury">

                                Agregar al carrito

                            </button>

                        </form>

                        <a href="/productos"
                           class="btn btn-back">

                            Regresar

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection