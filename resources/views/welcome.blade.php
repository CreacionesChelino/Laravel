@extends('layouts.user_type.guest')

@section('content')
    <br>
    <br>
    <br>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        @foreach ($products as $p)
                            {{-- muestra 3 productos por columna --}}
                            @if ($loop->iteration % 3 == 1)
                                <div class="row">
                            @endif
                            <div class="col-md-4">
                                <div class="card-body">
                                    <img src="{{ $p->image ? asset('storage/' . $p->image) : asset('img/default.jpg') }}"
                                        class="card-img-top" alt="{{ $p->name }}">
                                    <div class="card card-lift--hover shadow border-0">
                                        <div class="card-body py-5">
                                            <h6 class="text-primary text-uppercase">{{ $p->name }}</h6>
                                            <p class="description mt-3">
                                                {{ $p->description }}
                                            </p>
                                            <div>
                                                <span class="badge badge-pill badge-primary">{{ $p->precio_sale }}</span>
                                            </div>
                                            <a href="{{ route('add.cart', $p->id) }}"
                                                class="btn btn-primary mt-4">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
