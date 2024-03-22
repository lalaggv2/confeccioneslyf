@extends('home')

@section('template_title')
    Certificado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Certificado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('certificados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tipo Certificado</th>
										<th>Id Empleado</th>
										<th>Cargo</th>
										<th>Salario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificados as $certificado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $certificado->tipo_certificado }}</td>
											<td>{{ $certificado->id_empleado }}</td>
											<td>{{ $certificado->cargo }}</td>
											<td>{{ $certificado->salario }}</td>

                                            <td>
                                                <form action="{{ route('certificados.destroy',$certificado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('certificados.show',$certificado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('certificados.edit',$certificado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $certificados->links() !!}
            </div>
        </div>
    </div>
@endsection
