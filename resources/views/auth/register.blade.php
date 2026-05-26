@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow p-4">

            <h2 class="text-center mb-4">
                Registro
            </h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/register">

                @csrf

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Apellido</label>
                    <input type="text"
                           name="apellido"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email"
                           name="correo"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text"
                           name="telefono"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>País</label>
                    <input type="text"
                           name="pais"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Confirmar contraseña</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-custom w-100">
                    Registrarse
                </button>

            </form>

        </div>

    </div>
</div>

@endsection