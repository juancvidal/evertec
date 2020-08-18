@extends('layout')

@section('content')

    {{ $errors }}
    <section class="container">
        <div class="row align-items-center justify-content-center">
            <div class="card px-0 mt-5" style="width: 100em">
                <div class="card-header d-flex justify-content-center py-3">
                    <h4>Listado de ordenes</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre cliente</th>
                                <th scope="col">Email cliente</th>
                                <th scope="col">Celular cliente</th>
                                <th scope="col">Dirección cliente</th>
                                <th scope="col">Estado orden</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_email }}</td>
                                    <td>{{ $order->customer_mobile }}</td>
                                    <td>{{ $order->customer_address }}</td>
                                    <td>{{ $order->status }}</td>
                                    
                                </tr>
                            @empty
                                No existen registros
                            @endforelse
                        </tbody>                        
                    </table>
                    <div class="row justify-content-center">
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
