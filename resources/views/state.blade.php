@extends('layout')

@section('content')

    {{ $errors }}
    <section class="container">
        <div class="row align-items-center justify-content-center">
            <div class="card px-0 mt-5" style="width: 35em">
                <div class="card-header d-flex justify-content-center py-3">
                    <h4>Estado orden</h4>
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    @switch($order->status)
                        @case('PENDING')
                        <div class="row ">
                            <h5 class="text-center">Su pago esta pendiente</h5>
                        </div>
                        <a class="btn btn-primary mt-4" href="{{ $order->process_url }}">Volver al pago</a>
                        @break
                        @case('REJECTED')
                        <div class="row ">
                            <h5 class="text-center">Su pago ha sido declinado</h5>
                        </div>
                        <a class="btn btn-primary mt-4" href="{{ route('home') }}">Comprar</a>
                        @break
                        @default
                        <div class="row ">
                            <h5 class="text-center">Pago exitoso</h5>
                        </div>
                        <a class="btn btn-primary mt-4" href="{{ route('home') }}">Seguir Comprando</a>
                    @endswitch

                </div>
            </div>
        </div>

    </section>

@endsection
