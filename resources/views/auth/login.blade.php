@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow p-4">

            <h2 class="text-center mb-4">
                Iniciar Sesión
            </h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">

                @csrf

                <div class="mb-3">
    <label>Correo</label>

    <input type="email"
           name="correo"
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

                <button class="btn btn-custom w-100">
                    Entrar
                </button>

            </form>

        </div>

    </div>
</div>

@endsection