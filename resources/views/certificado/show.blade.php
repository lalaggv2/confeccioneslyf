@extends('layouts.app')

@section('template_title')
    {{ $certificado->name ?? __('Show') . " " . __('Certificado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Certificado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('certificados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo Certificado:</strong>
                            {{ $certificado->tipo_certificado }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id Empleado:</strong>
                            {{ $certificado->id_empleado }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cargo:</strong>
                            {{ $certificado->cargo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Salario:</strong>
                            {{ $certificado->salario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
