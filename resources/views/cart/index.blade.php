@extends('layouts.user_type.auth')

@section('content')
    <div class="panel-body">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>.
                    {{ session('message') }}.</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('messageDelete'))
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>.
                    {{ session('messageDelete') }}.</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('messageUpdate'))
            <div class="alert alert-info alert-dismissible text-white" role="alert">
                <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>.
                    {{ session('messageUpdate') }}.</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container-fluid py-4">
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">
                    Para apartar tus productos te recomendamos que realices la compra lo antes posible.</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Mi Carrito de compras</h6>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->product->name }}
                                        </td>
                                        <td>{{ $c->product->price }}</td>
                                        <td>{{ $c->quantity }}</td>
                                        <td>{{ $c->total }}</td>
                                        <td>
                                            <a type='button' href="/carrito/{{ $c->id }}/editar"><button
                                                    type='button' class="btn btn-success"><i
                                                        class="fas fa-pen-square"></i></button></a>

                                            <form action="{{ route('compras.store', $c->id) }}" method="POST">
                                                @csrf
                                                <button type='submit' class="btn btn-warning">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('compras.destroy', $c->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type='submit' class="btn btn-sm btn-danger"
                                                    onClick="return confirm('estas seguro  a eliminar el registro?')"> <i
                                                        class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $cart->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
