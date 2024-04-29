@extends('layouts.app')
@section('title' )
    INICIO
@endsection
@section('css')
@endsection
@section('content')
    <main id="main-container" class="d-flex justify-content-center align-items-center vh-100 mt-3">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="present text-center">
                        <a href="/"><img class="logolyf" src="{{ asset('/assets/images/lyflogo5v2.png')}}" alt="" width="100%" height="auto"></a>
                        <h1 class="h1 mb-3 mt-4 fw-normal">¡Bienvenido! Escoje la base de datos del menu</h1> <!-- Cambiado de 'h3' a 'h1' para hacer el texto más grande -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
@endsection
