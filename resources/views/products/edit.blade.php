@extends('layouts.user_type.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{route('products.update', $product->id)}}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Crear artículo</h4>
                            <!-- <p class="card-category">User information</p> -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="title" class="col-sm col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="name"  id="title" type="text" placeholder="Nombre" required aria-required="true" value="{{$product->name}}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="title" class="col-sm col-form-label">Descripcion</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="description"  id="description" type="text" placeholder="Descripcion del Producto" required aria-required="true" value="{{$product->description}}">
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="subtitle" class="col-sm col-form-label">Cantidad</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="quantity" id="quantity" type="number" placeholder="Piezas que tienes en tu lista" required aria-required="true" value="{{$product->quantity}}">
                                    </div>
                                    @if ($errors->has('cuantity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cuantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="subtitle" class="col-sm col-form-label">Stock</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="stock" id="stock" type="number" placeholder="Piezas que tienes disponibles" required aria-required="true" value="{{$product->stock}}">
                                    </div>
                                    @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="subtitle" class="col-sm col-form-label">Precio</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input class="form-control" name="price" id="price" type="number" placeholder="Precio" required aria-required="true" value="{{$product->price}}">
                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="subtitle" class="col-sm col-form-label">Activo</label>
                                <div class="col-sm-7">
                                    <select class="form-control bmd-form-group" name="active" id="active">
                                        <option value="1" @if($product->active == 1) selected @endif>Si</option>
                                        <option value="0" @if($product->active == 0) selected @endif>No</option>
                                    </select>
                                </div>
                                @if ($errors->has('active'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <label for="category_id" class="col-sm col-form-label">Categoría</label>
                                <div class="col-sm-7">
                                    <select class="form-control bmd-form-group" name="category_id" id="category_id">
                                        <option selected value="">Selecciona</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="btn-guardar" class="btn btn-primary">Guardar</button>
                </form>
            </div>

        </div>
    </div>
@endsection
