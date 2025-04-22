@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de personal administrativo</b></h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Llena los datos del formulario</div>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/administrativos', $administrativo->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rol">Nombre del rol</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                    </div>
                                    <select name="rol" id="rol" class="form-control">
                                        <option value="">Selecciona un rol.. </option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->name }}" {{ $rol->name == $administrativo->usuario->roles->pluck('name')->implode(', ') ? 'selected' : '' }}>
                                                {{ $rol->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('rol')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
                                    </div>
                                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $administrativo->nombre) }}" placeholder="Ecriba aqui el nombre completo">
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cve_servidor">Clave de servidor público</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
                                    </div>
                                        <input type="text" class="form-control" name="cve_servidor" value="{{ old('cve_servidor', $administrativo->cve_servidor) }}" placeholder="Ecriba aqui el número de servidor">
                                </div>
                                @error('cve_servidor')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adscrip
                                ">Adscripción</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
                                    </div>
                                        <input type="text" class="form-control" name="adscrip" value="{{ old('adscrip', $administrativo->adscrip) }}" placeholder="Ecriba aqui la adscripción">
                                </div>
                                @error('adscrip')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Telefono</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                        <input type="text" class="form-control" name="telefono" value="{{ old('telefono', $administrativo->telefono) }}" placeholder="Ecriba aqui el número de contacto">
                                </div>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Correo Electronico</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $administrativo->usuario->email) }}" placeholder="Ecriba aqui el número de contacto">
                                </div>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="profesion">Profesión</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
                                    </div>
                                        <input type="text" class="form-control" name="profesion" value="{{ old('profesion', $administrativo->profesion) }}" placeholder="Ecriba aqui el número de contacto">
                                </div>
                                @error('profesion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>




                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('/admin/administrativos')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')

@stop
