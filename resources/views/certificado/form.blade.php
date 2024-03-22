<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="tipo_certificado" class="form-label">{{ __('Tipo Certificado') }}</label>
            <input type="text" name="tipo_certificado" class="form-control @error('tipo_certificado') is-invalid @enderror" value="{{ old('tipo_certificado', $certificado?->tipo_certificado) }}" id="tipo_certificado" placeholder="Tipo Certificado">
            {!! $errors->first('tipo_certificado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_empleado" class="form-label">{{ __('Id Empleado') }}</label>
            <input type="text" name="id_empleado" class="form-control @error('id_empleado') is-invalid @enderror" value="{{ old('id_empleado', $certificado?->id_empleado) }}" id="id_empleado" placeholder="Id Empleado">
            {!! $errors->first('id_empleado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
            <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" value="{{ old('cargo', $certificado?->cargo) }}" id="cargo" placeholder="Cargo">
            {!! $errors->first('cargo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salario" class="form-label">{{ __('Salario') }}</label>
            <input type="text" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $certificado?->salario) }}" id="salario" placeholder="Salario">
            {!! $errors->first('salario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>