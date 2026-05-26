@extends('layouts.app')

@section('content')

<style>

    body{
        background-color: #f5f5f5;
    }

    .contact-hero{
        position: relative;
        height: 500px;
        border-radius: 30px;
        overflow: hidden;
        background:
        linear-gradient(rgba(8,15,35,0.80),
        rgba(8,15,35,0.88)),
        url('/images/hotel-premium.jpg');

        background-size: cover;
        background-position: center;

        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;

        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    }

    .contact-hero h1{
        font-size: 70px;
        color: white;
        font-weight: 800;
    }

    .gold{
        color: #d4af37;
    }

    .contact-hero p{
        color: #f1f1f1;
        font-size: 22px;
        margin-top: 20px;
    }

    .contact-card{
        background: white;
        border-radius: 25px;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: 0.3s;
        height: 100%;
    }

    .contact-card:hover{
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .contact-icon{
        font-size: 55px;
        color: #d4af37;
        margin-bottom: 20px;
    }

    .contact-card h3{
        color: #0b1f3a;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .contact-card p{
        color: #555;
        font-size: 18px;
        line-height: 1.8;
    }

    .section-title{
        text-align: center;
        margin-top: 90px;
        margin-bottom: 50px;
    }

    .section-title h2{
        font-size: 45px;
        color: #0b1f3a;
        font-weight: 800;
    }

    .section-title p{
        color: #777;
        font-size: 20px;
    }

    .premium-box{
        background: linear-gradient(135deg, #0b1f3a, #162544);
        border-radius: 30px;
        padding: 70px;
        color: white;
        margin-top: 100px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .premium-box h2{
        font-size: 50px;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .premium-box p{
        font-size: 20px;
        line-height: 1.9;
        color: #f1f1f1;
    }

    .btn-luxury{
        background: #d4af37;
        color: #0b1f3a;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        margin-top: 30px;
        transition: 0.3s;
    }

    .btn-luxury:hover{
        background: white;
        transform: scale(1.05);
        color: #0b1f3a;
    }

</style>

<div class="container py-5">

    {{-- HERO --}}
    <div class="contact-hero">

        <div>

            <h1>
                Contacta a <span class="gold">HOTELES NYD</span>
            </h1>

            <p>
                Atención exclusiva para clientes premium alrededor del mundo
            </p>

        </div>

    </div>

    {{-- TÍTULO --}}
    <div class="section-title">

        <h2>
            Atención Internacional de Lujo
        </h2>

        <p>
            Nuestro equipo está disponible para brindarte
            una experiencia VIP personalizada.
        </p>

    </div>

    {{-- TARJETAS --}}
    <div class="row g-4">

        <div class="col-md-4">

            <div class="contact-card text-center">

                <div class="contact-icon">
                    📧
                </div>

                <h3>Correo Premium</h3>

                <p>
                    contacto@hotelesnyd.com
                </p>

                <p>
                    Atención personalizada y soporte exclusivo
                    las 24 horas.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="contact-card text-center">

                <div class="contact-icon">
                    📞
                </div>

                <h3>Línea Ejecutiva</h3>

                <p>
                    +52 33 0000 0000
                </p>

                <p>
                    Concierge internacional para reservas,
                    experiencias VIP y servicios especiales.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="contact-card text-center">

                <div class="contact-icon">
                    🌎
                </div>

                <h3>Presencia Mundial</h3>

                <p>
                    Nueva York, Dubái, París, Tokio,
                    Cancún y más destinos premium.
                </p>

            </div>

        </div>

    </div>

    {{-- SECCIÓN FINAL --}}
    <div class="premium-box">

        <h2>
            Vive la Experiencia NYD
        </h2>

        <p>
            En HOTELES NYD redefinimos el lujo con experiencias
            cinco estrellas, suites premium, gastronomía internacional
            y atención personalizada diseñada para nuestros huéspedes
            más exclusivos.
        </p>

        <a href="/productos" class="btn-luxury">
            Explorar Habitaciones
        </a>

    </div>

</div>

@endsection