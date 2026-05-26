@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- TITULO --}}
    <div class="text-center mb-5">

        <h1 class="fw-bold"
            style="
                font-size:58px;
                color:#0f172a;
                letter-spacing:2px;
            ">
            Mis Reservaciones
        </h1>

        <p class="text-secondary fs-5">
            Historial de pedidos y pagos realizados
        </p>

    </div>


    {{-- ALERTAS --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show border-0 shadow rounded-4 mb-4"
             role="alert">

            <strong>⚠ Error:</strong>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show border-0 shadow rounded-4 mb-4"
             role="alert">

            <strong>✔ Éxito:</strong>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif



    {{-- TABLA PREMIUM --}}
    <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

        {{-- HEADER --}}
        <div class="card-header border-0 py-4"
             style="
                background: linear-gradient(135deg,#0f172a,#1e293b);
             ">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="text-white fw-bold mb-0">
                    🏨 Historial Premium
                </h2>

                <span class="badge rounded-pill px-4 py-3"
                      style="
                        background-color:#d4af37;
                        color:#0f172a;
                        font-size:14px;
                      ">
                    CLIENTE VIP
                </span>

            </div>

        </div>


        {{-- BODY --}}
        <div class="card-body p-0 bg-white">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead style="background-color:#f8fafc;">

                        <tr>

                            <th class="py-4 px-4">#</th>
                            <th class="py-4">Fecha</th>
                            <th class="py-4">Estado</th>
                            <th class="py-4">Total</th>
                            <th class="py-4">Pago</th>
                            <th class="py-4">Transacción</th>
                            <th class="py-4">Fecha Pago</th>
                            <th class="py-4 text-center">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                        <tr style="border-bottom:1px solid #edf2f7;">

                            <td class="px-4 fw-bold text-dark">
                                #{{ $order['id'] }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}
                            </td>

                            <td>

                                <span class="badge rounded-pill px-3 py-2"
                                      style="
                                        background-color:#cfe8ff;
                                        color:#0f172a;
                                        font-size:13px;
                                      ">

                                    {{ strtoupper($order['status']) }}

                                </span>

                            </td>

                            <td class="fw-bold text-success fs-5">
                                ${{ number_format($order['total'], 2) }}
                            </td>

                            <td>

                                @if(($order['payment_status'] ?? 'pendiente') == 'pagado')

                                    <span class="badge rounded-pill px-3 py-2"
                                          style="
                                            background-color:#d1fae5;
                                            color:#065f46;
                                          ">

                                        PAGADO

                                    </span>

                                @else

                                    <span class="badge rounded-pill px-3 py-2"
                                          style="
                                            background-color:#fef3c7;
                                            color:#92400e;
                                          ">

                                        PENDIENTE

                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($order['transaction_id'])

                                    <span class="fw-semibold text-dark">
                                        {{ $order['transaction_id'] }}
                                    </span>

                                @else

                                    <span class="text-secondary">
                                        Sin pago
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($order['payment_date'])

                                    {{ $order['payment_date'] }}

                                @else

                                    <span class="text-secondary">
                                        Sin fecha
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <div class="d-flex flex-column gap-2">

                                    <a href="{{ route('orders.show', $order['id']) }}"
                                       class="btn rounded-pill fw-semibold"
                                       style="
                                            background-color:#2563eb;
                                            color:white;
                                            border:none;
                                       ">

                                        Ver Detalle

                                    </a>


                                    @if(($order['payment_status'] ?? 'pendiente') != 'pagado')

                                        <a href="{{ route('payment.pay', $order['id']) }}"
                                           class="btn rounded-pill fw-semibold"
                                           style="
                                                background-color:#0f9d58;
                                                color:white;
                                                border:none;
                                           ">

                                            Pagar con PayPal

                                        </a>

                                    @else

                                        <span class="badge rounded-pill py-3"
                                              style="
                                                background-color:#d1fae5;
                                                color:#065f46;
                                              ">

                                            ✔ Pago realizado

                                        </span>

                                    @endif

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection