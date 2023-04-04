@extends('layouts.user_type.auth')

@section('content')
    {{-- //muestra la informacion del producto que recibe, y divide en 2 columnas, donde una es la imagen y en la otra muestra el precio --}}
    <div class="container">
        <div class="row">
            <form action="{{ route('add.store.cart', $product->id) }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p>Precio: ${{ $product->price }}</p>
                    <div class="col-2">
                        <label for="quantity">Cantidad</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" min="1" max="{{$product->stock}}" required>
                    </div>
                    <br>
                    <p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Regresar</a>
                        {{-- <a href="{{ route('products.cart', $product->id) }}" class="btn btn-success">Agregar al carrito</a> --}}
                        @csrf
                        <button type="submit" class="btn btn-success">Agregar al carrito</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
