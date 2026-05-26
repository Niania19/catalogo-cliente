<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteles NYD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family: 'Segoe UI', sans-serif;
            background:#f5f5f5;
            overflow-x:hidden;
        }

        /* NAVBAR */

        .navbar-custom{
            background:#081b3a;
            padding:20px 60px;
        }

        .navbar-brand{
            color:white !important;
            font-size:32px;
            font-weight:bold;
            letter-spacing:2px;
        }

        .navbar-nav .nav-link{
            color:white !important;
            margin-left:25px;
            font-size:18px;
            transition:0.3s;
        }

        .navbar-nav .nav-link:hover{
            color:#d4af37 !important;
        }

        /* HERO */

        .hero-section{
            height:100vh;

            background:
            linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
            url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070');

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
            font-size:80px;
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
            color:#e0e0e0;
        }

        .btn-premium{
            background:#d4af37;
            color:black;
            border:none;
            padding:16px 40px;
            font-size:20px;
            font-weight:bold;
            border-radius:50px;
            transition:0.3s;
            text-decoration:none;
        }

        .btn-premium:hover{
            background:white;
            transform:translateY(-3px);
        }

        /* SERVICIOS */

        .services-section{
            padding:100px 20px;
        }

        .section-title{
            font-size:50px;
            font-weight:800;
            color:#081b3a;
            margin-bottom:10px;
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
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
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
            margin-bottom:15px;
            color:#081b3a;
            font-weight:bold;
        }

        .service-card p{
            color:#666;
            font-size:18px;
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            .hero-title{
                font-size:50px;
            }

            .hero-subtitle{
                font-size:18px;
            }

            .navbar-custom{
                padding:20px;
            }

        }

    </style>

</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">

            <a class="navbar-brand" href="#">
                HOTELES NYD
            </a>

            <button class="navbar-toggler bg-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Habitaciones</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Iniciar Sesión
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- HERO -->

    <section class="hero-section">

        <div class="hero-content">

            <h1 class="hero-title">
                Vive una experiencia <span>Premium</span>
            </h1>

            <p class="hero-subtitle">

                Descubre lujo, comodidad y exclusividad
                en los mejores hoteles del mundo.

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

                Diseñado para brindarte la mejor experiencia.

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

                        Experiencias gastronómicas de lujo
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

                        Espacios exclusivos para descansar
                        y disfrutar completamente.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>