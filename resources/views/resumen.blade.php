@extends('layout')

@section('content')

    {{ $errors }}
    <section class="container">
        <div class="row align-items-center justify-content-center">
            <div class="card px-0 mt-5" style="width: 35em">
                <div class="card-header d-flex justify-content-center py-3">
                    <h4>Resumen orden</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>                               
                                <th scope="col">Nombre cliente</th>
                                <th scope="col">Email cliente</th>
                                <th scope="col">Celular cliente</th>
                                <th scope="col">Dirección cliente</th>
                                <th scope="col">Estado orden</th>
                                <th scope="col">Total</th>                                
                            </tr>
                        </thead>
                        <tbody>                            
                                <tr>                                   
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_email }}</td>
                                    <td>{{ $order->customer_mobile }}</td>
                                    <td>{{ $order->customer_address }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->total }}</td>                                    
                                </tr>                           
                        </tbody>                        
                    </table>
                    
                 <a class="btn btn-primary"href="{{$order->process_url}}">Pagar</a>
                </div>
            </div>
        </div>

    </section>

@endsection
