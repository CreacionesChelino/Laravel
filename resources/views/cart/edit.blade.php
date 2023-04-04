@extends('layouts.user_type.auth')

@section('content')
    {{-- //muestra la informacion del producto que recibe, y divide en 2 columnas, donde una es la imagen y en la otra muestra el precio --}}
    <div class="container">

        <div class="row">
            <form action="{{ route('cart.edit', $cart->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">
                            De momento solo se puede actualizar la cantidad de productos.
                        </span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <img src="{{ asset('storage/' . $cart->product->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <h2>{{ $cart->product->name }}</h2>
                    <p>{{ $cart->product->description }}</p>
                    <p>Precio: ${{ $cart->product->price }}</p>
                    <div class="col-2">
                        <label for="quantity">Cantidad</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" min="1"
                            max="10" value="{{ $cart->quantity }}">
                    </div>
                    <br>
                    <p>
                        <a href="{{ route('cart.index') }}" class="btn btn-primary">Regresar</a>
                        {{-- <a href="{{ route('products.cart', $product->id) }}" class="btn btn-success">Agregar al carrito</a> --}}
                        @csrf
                        <button type="submit" class="btn btn-success">Actualizar carrito</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
