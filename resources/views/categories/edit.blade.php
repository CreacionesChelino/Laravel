@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Categoria</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    @method('PUT')
                                    <label class="col" for="">Nombre Categoria:</label>
                                    <br>
                                    <input id="name" class="col-12 form-control" type="text" name="name"
                                        value="{{ $category->name }}">
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-secondary"
                                            href="{{ route('categories.index') }}">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
