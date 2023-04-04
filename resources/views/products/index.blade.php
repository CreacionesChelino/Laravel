@extends('layouts.user_type.auth')

@section('content')
    @if (Auth::user()->role_id === 1)
        <div class="panel-body">
            @if (session('message'))
                <div class="alert alert-info alert-dismissible text-white" role="alert">
                    <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>.
                        {{ session('mesage') }}.</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('messageDelete'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>.
                        {{ session('mesageDelete') }}.</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('messageUpdate'))
                <div class="alert alert-info alert-dismissible text-white" role="alert">
                    <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>.
                        {{ session('mesageUpdate') }}.</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Lista De Productos</h6>
                                    <div class="float-end">
                                        <a href="{{ route('products.create') }}">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Agregar">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Clave</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Stock</th>
                                        <th>Activo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->active == 1 ? 'Activo' : 'Inactivo' }}</td>
                                            <td>
                                                <a type='button' href="/productos/{{ $product->id }}/editar"><button
                                                        type='button' class="btn btn-success"><i
                                                            class="fas fa-pen-square"></i></button></a>


                                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type='submit' class="btn btn-sm btn-danger"
                                                        onClick="return confirm('Estas seguro  a eliminar el registro?')">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista De Productos</h6>
                            </div>
                        </div>
                        {{-- recorre el arreglo de productos y los muestra en la vista pero muestra 3 productos por columna --}}
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
        </div>
    @endif

@endsection
