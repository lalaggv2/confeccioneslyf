@extends('layouts.app')
@section('title' )
    CLIENTES
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection
@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>CLIENTES</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add"><i class="fa fa-plus"></i> Agregar Cliente</button>
        <div class="card-body">
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
@endsection
