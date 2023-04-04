@extends('layouts.user_type.guest')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                @if (session('success'))
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm"> <a href="javascript:;"
                                                class="alert-link text-white">Excelente</a>.
                                            {{ session('success') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (session('email'))
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm"> <a href="javascript:;"
                                                class="alert-link text-white">Error</a>.
                                            {{ session('email') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Bienvenido de nuevo</h3>
                                    {{-- <p class="mb-0">Create a new acount<br></p>
                  <p class="mb-0">OR Sign in with these credentials:</p>
                  <p class="mb-0">Email <b>admin@softui.com</b></p>
                  <p class="mb-0">Password <b>secret</b></p> --}}
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="/session">
                                        @csrf
                                        <label>Correo Electronico</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" aria-label="Correo Electronico"
                                                aria-describedby="email-addon">
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <label>Contraseña</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Password" aria-label="Contraseña"
                                                aria-describedby="password-addon">
                                            @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                            <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Inicia
                                                Sesion</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <small class="text-muted">¿Olvidaste tu contraseña? Restablecela
                                        <a href="/login/forgot-password"
                                            class="text-info text-gradient font-weight-bold">aqui</a>
                                    </small>
                                    <p class="mb-4 text-sm mx-auto">
                                        ¿No tienes cuenta?
                                        <a href="register" class="text-info text-gradient font-weight-bold">Registrate</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
