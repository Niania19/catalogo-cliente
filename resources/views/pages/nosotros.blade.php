@extends('layouts.app')

@section('content')

<style>

    body{
        background-color: #f5f5f5;
    }

    .hero-nosotros{
        position: relative;
        height: 650px;
        border-radius: 30px;
        overflow: hidden;
        background:
        linear-gradient(rgba(8,15,35,0.75),
        rgba(8,15,35,0.85)),
        url('/images/hotel-premium.jpg');

        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;

        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    }

    .hero-content{
        max-width: 900px;
        padding: 40px;
    }

    .hero-content h1{
        font-size: 70px;
        font-weight: 800;
        color: white;
        margin-bottom: 20px;
    }

    .gold{
        color: #d4af37;
    }

    .hero-content p{
        color: #f1f1f1;
        font-size: 22px;
        line-height: 1.8;
    }

    .section-title{
        font-size: 45px;
        font-weight: 800;
        color: #0b1f3a;
        margin-bottom: 20px;
    }

    .premium-card{
        background: white;
        border-radius: 25px;
        padding: 40px;
        transition: 0.3s;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 100%;
    }

    .premium-card:hover{
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .premium-card h3{
        color: #0b1f3a;
        font-weight: 700;
        margin-top: 20px;
    }

    .premium-card p{
        color: #555;
        line-height: 1.8;
    }

    .icon-premium{
        font-size: 50px;
        color: #d4af37;
    }

    .stats-section{
        background: linear-gradient(135deg, #0b1f3a, #162544);
        border-radius: 30px;
        padding: 70px 40px;
        margin-top: 80px;
        color: white;
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .stat-box h2{
        font-size: 55px;
        color: #d4af37;
        font-weight: 800;
    }

    .stat-box p{
        font-size: 18px;
        margin-top: 10px;
    }

    .luxury-section{
        margin-top: 100px;
    }

    .luxury-text{
        padding: 40px;
    }

    .luxury-text h2{
        font-size: 50px;
        font-weight: 800;
        color: #0b1f3a;
        margin-bottom: 25px;
    }

    .luxury-text p{
        font-size: 20px;
        line-height: 1.9;
        color: #444;
    }

    .luxury-image{
        width: 100%;
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .services-title{
        text-align: center;
        margin-top: 100px;
        margin-bottom: 50px;
    }

</style>

<div class="container py-5">

    {{-- HERO --}}
    <div class="hero-nosotros">

        <div class="hero-content">

            <h1>
                HOTELES <span class="gold">NYD</span>
            </h1>

            <p>
                Una franquicia hotelera de lujo diseñada para transformar
                la experiencia de hospedaje a nivel mundial.
                Combinamos elegancia, exclusividad, innovación y confort
                en cada uno de nuestros destinos premium.
            </p>

        </div>

    </div>

    {{-- QUIÉNES SOMOS --}}
    <div class="row luxury-section align-items-center">

        <div class="col-md-6">

            <div class="luxury-text">

                <h2>
                    Lujo Sin Límites
                </h2>

                <p>
                    En HOTELES NYD ofrecemos una experiencia cinco estrellas
                    enfocada en el máximo confort, privacidad y exclusividad.
                    Nuestra visión es convertirnos en una de las cadenas
                    hoteleras más prestigiosas del mundo, llevando lujo,
                    arquitectura moderna y atención VIP a cada ciudad.
                </p>

                <p>
                    Contamos con suites premium, spas de lujo,
                    restaurantes gourmet, experiencias turísticas privadas,
                    piscinas infinitas, vistas panorámicas y servicios
                    personalizados para cada huésped.
                </p>

            </div>

        </div>

        <div class="col-md-6">

            <img src="/images/hotel-premium.jpg"
                 class="luxury-image">

        </div>

    </div>

    {{-- SERVICIOS --}}
    <div class="services-title">

        <h2 class="section-title">
            Experiencias Premium
        </h2>

        <p class="text-muted fs-5">
            Diseñadas para clientes exclusivos alrededor del mundo
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

            <div class="premium-card text-center">

                <div class="icon-premium">
                    🏨
                </div>

                <h3>Suites de Lujo</h3>

                <p>
                    Habitaciones premium con diseño moderno,
                    tecnología inteligente y vistas espectaculares.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="premium-card text-center">

                <div class="icon-premium">
                    🍷
                </div>

                <h3>Restaurantes Gourmet</h3>

                <p>
                    Gastronomía internacional preparada por chefs
                    reconocidos mundialmente.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="premium-card text-center">

                <div class="icon-premium">
                    ✈️
                </div>

                <h3>Experiencias VIP</h3>

                <p>
                    Tours privados, transporte ejecutivo,
                    concierge y atención personalizada.
                </p>

            </div>

        </div>

    </div>

    {{-- ESTADÍSTICAS --}}
    <div class="stats-section">

        <div class="row text-center">

            <div class="col-md-3 stat-box">

                <h2>25+</h2>

                <p>
                    Destinos Internacionales
                </p>

            </div>

            <div class="col-md-3 stat-box">

                <h2>5★</h2>

                <p>
                    Experiencia Premium
                </p>

            </div>

            <div class="col-md-3 stat-box">

                <h2>50K+</h2>

                <p>
                    Clientes Satisfechos
                </p>

            </div>

            <div class="col-md-3 stat-box">

                <h2>24/7</h2>

                <p>
                    Atención Exclusiva
                </p>

            </div>

        </div>

    </div>

</div>

@endsection