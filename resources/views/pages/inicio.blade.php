@extends('layouts.app')

@section('content')

<style>

    body{
        background:#f4f4f4;
        overflow-x:hidden;
    }

    /* HERO */

    .hero-section{

        height:100vh;

        background:
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
        url('/images/imagen.Hoteles.nyd.png');

        background-size:cover;
        background-position:center;

        display:flex;
        align-items:center;
        justify-content:center;

        text-align:center;

        padding:20px;
    }

    .hero-content{

        max-width:900px;
        color:white;
    }

    .hero-title{

        font-size:85px;
        font-weight:800;
        margin-bottom:20px;
        line-height:1.1;
    }

    .hero-title span{

        color:#d4af37;
    }

    .hero-subtitle{

        font-size:24px;
        margin-bottom:40px;
        color:#eaeaea;
    }

    .btn-premium{

        background:#d4af37;
        color:black;
        border:none;

        padding:18px 45px;

        font-size:20px;
        font-weight:bold;

        border-radius:50px;

        transition:0.3s;

        text-decoration:none;
    }

    .btn-premium:hover{

        background:white;
        transform:translateY(-5px);
        color:black;
    }

    /* SERVICES */

    .services-section{

        padding:100px 20px;
    }

    .section-title{

        font-size:50px;
        font-weight:800;
        color:#081b3a;
        margin-bottom:15px;
    }

    .section-subtitle{

        color:#666;
        font-size:20px;
        margin-bottom:60px;
    }

    .service-card{

        background:white;

        border-radius:25px;

        padding:40px 30px;

        text-align:center;

        box-shadow:0 10px 30px rgba(0,0,0,0.12);

        transition:0.3s;

        height:100%;
    }

    .service-card:hover{

        transform:translateY(-10px);
    }

    .service-icon{

        font-size:60px;
        margin-bottom:20px;
    }

    .service-card h4{

        font-size:28px;
        font-weight:bold;
        color:#081b3a;
        margin-bottom:15px;
    }

    .service-card p{

        color:#666;
        font-size:18px;
    }

    @media(max-width:768px){

        .hero-title{
            font-size:50px;
        }

        .hero-subtitle{
            font-size:18px;
        }

    }

</style>

<!-- HERO -->

<section class="hero-section">

    <div class="hero-content">

        <h1 class="hero-title">

            Vive una experiencia <span>Premium</span>

        </h1>

        <p class="hero-subtitle">

            Descubre lujo, elegancia y comodidad
            en los hoteles más exclusivos.

        </p>

        <a href="/productos" class="btn-premium">

            Explorar Habitaciones

        </a>

    </div>

</section>

<!-- SERVICIOS -->

<section class="services-section container">

    <div class="text-center">

        <h2 class="section-title">

            Servicios Exclusivos

        </h2>

        <p class="section-subtitle">

            Diseñado para brindarte una experiencia inolvidable.

        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

            <div class="service-card">

                <div class="service-icon">
                    🏨
                </div>

                <h4>
                    Suites Premium
                </h4>

                <p>

                    Habitaciones elegantes con vistas increíbles
                    y máximo confort.

                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="service-card">

                <div class="service-icon">
                    🍽️
                </div>

                <h4>
                    Restaurante Gourmet
                </h4>

                <p>

                    Experiencias gastronómicas exclusivas
                    con chefs internacionales.

                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="service-card">

                <div class="service-icon">
                    🌊
                </div>

                <h4>
                    Spa & Relax
                </h4>

                <p>

                    Espacios premium diseñados
                    para relajarte completamente.

                </p>

            </div>

        </div>

    </div>

</section>

@endsection