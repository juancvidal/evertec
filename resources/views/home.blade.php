@extends('layout')

@section('content')

    {{ $errors }}
    <section class="container">
        <div class="row align-items-center justify-content-center">
            <div class="card px-0 mt-5" style="width: 35em">
                <div class="card-header d-flex justify-content-center py-3">
                    <h4>Realizar compra</h4>
                </div>
                <div class="card-body">
                    <form class="mx-4" method="POST" action="{{ route('order') }}">
                        @csrf
                        <div class=" mb-3">
                            <label for="customer_name" class="form-label">Nombre</label>
                            <input name="customer_name" type="text" class="form-control" id="customer_name" value="Juan carlos">
                        </div>
                        <div class="mb-3">
                            <label for="customer_email" class="form-label">Email</label>
                            <input name="customer_email" type="email" class="form-control" id="customer_email" aria-describedby="emailHelp" value="j@v.com">
                        </div>
                        <div class="mb-3">
                            <label for="customer_address" class="form-label">Dirección</label>
                            <input name="customer_address" type="text" class="form-control" id="customer_address" value="cl 2 # 2-22">
                        </div>
                        <div class="mb-3">
                            <label for="customer_mobile" class="form-label">Celular</label>
                            <input name="customer_mobile" type="text" class="form-control" id="customer_mobile" value="321456789">
                        </div>
                        <button type="submit" class="btn btn-primary">Realizar orden</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection
