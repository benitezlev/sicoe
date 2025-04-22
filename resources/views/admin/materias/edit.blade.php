@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de una nueva materia</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Lleno los datos del formulario</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('admin/materias/' .$materia->id )}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="from-group">
                            <label for="carrera_id">Nombre de la Carrera</label><b>(*)</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-graduation-cap"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="carrera_id">
                                    <option value="">Seleccione una carrera</option>
                                    @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}"
                                        {{ old('carrera_id', $materia->carrera_id) == $carrera->id ? 'selected' : '' }}>
                                        {{ $carrera->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nombre')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la materia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $materia->nombre) }}" placeholder="Engresa el nombre de la materia" required>
                                    </div>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="codigo">Codigo de la materia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="codigo" value="{{ old('codigo', $materia->codigo) }}" placeholder="Engresa el codigo de la materia" required>
                                    </div>
                                    @error('codigo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/materias')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Nombre de la materia</label><b> (*)</b>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Engresa el nombre de la materia" required>
            </div>

        </div>
    </div>
</div>
