@extends('layouts.user_type.auth')

@section('content')

    <div class="panel-body">
        @if (session('message'))
            <div class="alert alert-info alert-dismissible text-white" role="alert">
      <span class="text-sm"> <a href="javascript:" class="alert-link text-white">Excelente</a>. {{ session('message')
        }}.</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('messageDelete'))
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
      <span class="text-sm"> <a href="javascript:" class="alert-link text-white">Excelente</a>. {{
        session('messageDelete') }}.</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('messageUpdate'))
            <div class="alert alert-info alert-dismissible text-white" role="alert">
      <span class="text-sm"> <a href="javascript:" class="alert-link text-white">Excelente</a>. {{ session('messageUpdate')
        }}.</span>
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
                                @if(auth()->user()->role_id === 1)
                                    <h6 class="text-white text-capitalize ps-3">Lista de Ventas</h6>
                                @else
                                    <h6 class="text-white text-capitalize ps-3">Mis compras</h6>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            @if(auth()->user()->role_id === 1 )
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>Clave</th>
                                        <th>Cliente</th>
                                        <th>Producto</th>
                                        <th>Pagado</th>
                                        <th>Cantidad</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $ventas)
                                        <tr>
                                            <td>{{$ventas->id}}</td>
                                            @foreach($user as $users)
                                                @if($users->id == $ventas->user_id)
                                                    <td>{{$users->name}} {{$users->app}} {{$users->apm}}</td>
                                                @endif
                                            @endforeach

                                            @foreach($carts as $cart)
                                                @if($cart->id == $ventas->cart_id)
                                                    @foreach($products as $product)
                                                        @if($product->id == $cart->product_id)
                                                            <td>{{$product->name}}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @if($ventas->paid == 1)
                                                <td>Pagado</td>
                                            @else
                                                <td>Sin pagar</td>
                                            @endif
                                            <td>{{$ventas->quantity}}</td>
                                            <td>
                                                <button type='button' class="btn btn-primary"><i class="far fa-eye"></i>
                                                </button>
                                                <a type='button' href="/ventas/{{$ventas->id}}/editar">
                                                    <button type='button' class="btn btn-success"><i
                                                            class="fas fa-pen-square"></i></button>
                                                </a>
                                                <button type='submit' class="btn btn-danger"
                                                        onClick="return confirm('estas seguro  a eliminar el registro?')">
                                                    <i
                                                        class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Pagado</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $ventas)
                                        <tr>
                                            @foreach($carts as $cart)
                                                @if($cart->id == $ventas->cart_id)
                                                    @foreach($products as $product)
                                                        @if($product->id == $cart->product_id)
                                                            <td>{{$product->name}}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @if($ventas->paid == 1)
                                                <td>Pagado</td>
                                            @else
                                                <td>Sin pagar</td>
                                            @endif
                                            <td>{{$ventas->quantity}}</td>
                                            <td> $ {{$ventas->total}}</td>
                                            <td>
                                                <button type='button' class="btn btn-primary"><i class="far fa-eye"></i>
                                                </button>
                                                <a type='button' href="/ventas/{{$ventas->id}}/editar">
                                                    <button type='button' class="btn btn-success"><i
                                                            class="fas fa-pen-square"></i></button>
                                                </a>
                                                <button type='submit' class="btn btn-danger"
                                                        onClick="return confirm('estas seguro  a eliminar el registro?')">
                                                    <i
                                                        class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        {{$sales->links()}}
                    </div>
                </div>
@endsection
