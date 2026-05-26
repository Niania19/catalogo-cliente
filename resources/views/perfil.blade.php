@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- ALERTAS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow border-0 rounded-4 mb-4">
            <strong>✔ Éxito:</strong> {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow border-0 rounded-4 mb-4">
            <strong>⚠ Error:</strong> {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- TITULO --}}
    <div class="text-center mb-5">

        <h1 class="fw-bold"
            style="
                font-size:60px;
                color:#0f172a;
                letter-spacing:2px;
            ">
            Área Premium
        </h1>

        <p class="text-secondary fs-5">
            Bienvenido nuevamente,
            <span class="fw-bold text-dark">
                {{ $usuario['nombre'] }}
            </span>
        </p>

    </div>


    {{-- PERFIL PREMIUM --}}
    <div class="card border-0 rounded-5 shadow-lg overflow-hidden mb-5">

        <div class="card-header border-0 py-4"
             style="
                background: linear-gradient(135deg,#0f172a,#1e293b);
             ">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="text-white fw-bold mb-0">
                    👤 Perfil del Cliente
                </h2>

                <span class="badge rounded-pill px-4 py-3"
                      style="
                        background-color:#d4af37;
                        color:#0f172a;
                        font-size:14px;
                      ">
                    PREMIUM MEMBER
                </span>

            </div>

        </div>

        <div class="card-body p-5 bg-white">

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="p-4 rounded-4 h-100"
                         style="
                            background-color:#f8fafc;
                            border:1px solid #e2e8f0;
                         ">

                        <small class="text-secondary">
                            Nombre
                        </small>

                        <h3 class="fw-bold mt-2">
                            {{ $usuario['nombre'] }}
                        </h3>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="p-4 rounded-4 h-100"
                         style="
                            background-color:#f8fafc;
                            border:1px solid #e2e8f0;
                         ">

                        <small class="text-secondary">
                            Apellido
                        </small>

                        <h3 class="fw-bold mt-2">
                            {{ $usuario['apellido'] }}
                        </h3>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="p-4 rounded-4 h-100"
                         style="
                            background-color:#f8fafc;
                            border:1px solid #e2e8f0;
                         ">

                        <small class="text-secondary">
                            Correo Electrónico
                        </small>

                        <h5 class="fw-semibold mt-2">
                            {{ $usuario['correo'] }}
                        </h5>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="p-4 rounded-4 h-100"
                         style="
                            background-color:#f8fafc;
                            border:1px solid #e2e8f0;
                         ">

                        <small class="text-secondary">
                            Teléfono
                        </small>

                        <h5 class="fw-semibold mt-2">
                            {{ $usuario['telefono'] }}
                        </h5>

                    </div>

                </div>


                <div class="col-md-12">

                    <div class="p-4 rounded-4"
                         style="
                            background-color:#f8fafc;
                            border:1px solid #e2e8f0;
                         ">

                        <small class="text-secondary">
                            País
                        </small>

                        <h5 class="fw-semibold mt-2">
                            🌍 {{ $usuario['pais'] }}
                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection