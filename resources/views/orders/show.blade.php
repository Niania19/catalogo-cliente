@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Detalle del Pedido #{{ $order['id'] }}</h3>
            <a href="{{ route('perfil') }}" class="btn btn-light btn-sm">Volver al Perfil</a>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Información del Pedido</h5>
                    <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}</p>
                    <p><strong>Estado:</strong> 
                        <span class="badge {{ $order['status'] == 'cancelado' ? 'bg-danger' : 'bg-warning text-dark' }}">
                            {{ strtoupper($order['status']) }}
                        </span>
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Total Pagado</h5>
                    <h2 class="text-success">${{ number_format($order['total'], 2) }}</h2>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order['items'] as $item)
                    <tr>
                        <td>{{ $item['producto']['nombre'] ?? 'Producto no disponible' }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <div class="d-flex justify-content-end mt-4">
                @if($order['status'] !== 'cancelado')
                    <form action="/orders/{{ $order['id'] }}/cancel" method="POST">
                        @csrf
                        
                        <button type="submit" class="btn btn-danger">
                        Cancelar Pedido    
                        </button>
                    </form>
                @else
                    <div class="alert alert-secondary w-100 text-center">
                        <strong>Aviso:</strong> Este pedido ya se encuentra cancelado y el stock fue devuelto.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection