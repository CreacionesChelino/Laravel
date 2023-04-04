@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{route('sales.store', $sales->id)}}" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Crear Venta</h4>
                            <!-- <p class="card-category">User information</p> -->
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label for="subtitle" class="col-sm col-form-label">Nombre del Cliente</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="cliente" id="cliente" type="text" placeholder="Nombre del cliente" required aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="product_id" class="col-sm col-form-label">Producto</label>
                                <div class="col-sm-7">
                                    <select class="form-control bmd-form-group" name="product_id" id="product_id">
                                        <option selected value="">Selecciona</option>
                                        @foreach($products as $product)
                                            <option value="{!! $product->id !!}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="subtitle" class="col-sm col-form-label">Cantidad</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="quantity" id="quantity" type="number" placeholder="Cantidad" required aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="product_id" class="col-sm col-form-label">Descuento</label>
                                <div class="col-sm-7">
                                    <select class="form-control bmd-form-group" name="discount" id="discount">
                                        <option selected value="">Selecciona</option>
                                        <option value="10">10 %</option>
                                        <option value="20">20 %</option>
                                        <option value="30">30 %</option>
                                        <option value="40">40 %</option>
                                        <option value="50">50 %</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="user_id" class="col-sm col-form-label">Vendedor</label>
                                <div class="col-sm-7">
                                    <select class="form-control bmd-form-group" name="user_id" id="user_id">
                                        <option selected value="">Selecciona</option>
                                        @foreach($users as $usuario)
                                            <option value="{!! $usuario->id !!}">{{ $usuario->name}} {{$usuario->app}} {{$usuario->apm}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="btn-guardar" class="btn btn-primary">Vender</button>
                </form>
            </div>
        </div>
    </div>
@endsection
