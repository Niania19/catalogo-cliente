<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Hoteles NYD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            background:#f4f4f4;
            font-family:'Segoe UI', sans-serif;
            overflow-x:hidden;
        }

        /* NAVBAR */

        .navbar-custom{

            background:rgba(8,27,58,0.92);

            backdrop-filter:blur(12px);

            padding:18px 0;

            box-shadow:0 5px 20px rgba(0,0,0,0.15);

            position:sticky;

            top:0;

            z-index:999;
        }

        .navbar-brand{

            color:white !important;

            font-size:32px;

            font-weight:800;

            letter-spacing:2px;
        }

        .navbar-brand span{

            color:#d4af37;
        }

        .navbar-nav{

            align-items:center;
        }

        .navbar-nav .nav-link{

            color:white !important;

            margin-left:22px;

            font-size:17px;

            position:relative;

            transition:0.3s;
        }

        .navbar-nav .nav-link:hover{

            color:#d4af37 !important;
        }

        .navbar-nav .nav-link::after{

            content:'';

            position:absolute;

            left:0;
            bottom:-5px;

            width:0;

            height:2px;

            background:#d4af37;

            transition:0.3s;
        }

        .navbar-nav .nav-link:hover::after{

            width:100%;
        }

        /* BOTONES */

        .btn-premium{

            background:#d4af37;

            color:black;

            border:none;

            padding:10px 20px;

            border-radius:30px;

            font-weight:700;

            transition:0.3s;
        }

        .btn-premium:hover{

            background:white;

            transform:translateY(-2px);
        }

        .btn-logout{

            background:#dc2626;

            color:white;

            border:none;

            padding:8px 18px;

            border-radius:25px;

            font-weight:600;

            transition:0.3s;
        }

        .btn-logout:hover{

            background:#b91c1c;
        }

        /* CONTENIDO */

        .main-content{

            min-height:80vh;
        }

        /* FOOTER */

        footer{

            background:#081b3a;

            color:white;

            margin-top:80px;

            padding:50px 20px;

            text-align:center;
        }

        footer h4{

            color:#d4af37;

            margin-bottom:15px;
        }

        footer p{

            color:#d1d5db;
        }

        /* RESPONSIVE */

        @media(max-width:991px){

            .navbar-nav{

                margin-top:20px;
            }

            .navbar-nav .nav-link{

                margin-left:0;
                margin-bottom:12px;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container">

        <a class="navbar-brand"
           href="/">

            HOTELES <span>NYD</span>

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end"
             id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link"
                       href="/">

                        Inicio

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/nosotros">

                        Nosotros

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/productos">

                        Habitaciones

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/contacto">

                        Contacto

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('cart.index') }}">

                        🛒 {{ count(session('cart', [])) }}

                    </a>

                </li>

                @if(!session('token'))

                    <li class="nav-item">

                        <a class="nav-link"
                           href="/login">

                            Iniciar Sesión

                        </a>

                    </li>

                    <li class="nav-item ms-3">

                        <a href="/register"
                           class="btn btn-premium">

                            Registrarse

                        </a>

                    </li>

                @else

                    <li class="nav-item">

                        <a class="nav-link"
                           href="/perfil">

                            Mi Perfil

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                           href="{{ route('orders.index') }}">

                            Mis Pedidos

                        </a>

                    </li>

                    <li class="nav-item text-white ms-3">

                        Hola,
                        <strong>
                            {{ session('usuario.nombre') ?? 'Usuario' }}
                        </strong>

                    </li>

                    <li class="nav-item ms-3">

                        <form action="/logout"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="btn btn-logout">

                                Cerrar Sesión

                            </button>

                        </form>

                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>

<!-- CONTENIDO -->

<div class="main-content">

    @yield('content')

</div>

<!-- FOOTER -->

<footer>

    <h4>

        HOTELES NYD

    </h4>

    <p>

        Elegancia, lujo y experiencias premium.

    </p>

    <p>

        © 2026 Todos los derechos reservados

    </p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>