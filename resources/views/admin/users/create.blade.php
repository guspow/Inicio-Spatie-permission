@extends('layouts.app')
@section('estilos')
<!-- Custom styles for this page -->
<link href="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>  --}}
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li> 
        <li class="breadcrumb-item active" aria-current="page">Crear Usuario</li> 
@endsection
@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row col-lg-12">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary float-left">Crear Usuario</h6>
            </div>
            <div class="col-lg-6">
                <a href="{{route('users.index')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Regresar</span>
                </a>
            </div> 
        </div>
    </div> 
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="p-5"> --}}
                    <form id="frmDatos" method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required value="{{old('nombre')}}">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="appaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="appaterno" name="appaterno" required value="{{old('nombre')}}">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="apmaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="apmaterno" name="apmaterno" required value="{{old('nombre')}}">
                            </div>
                        </div>
                        <div class="form-group row" style="height: 78px;">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required value="{{old('nombre')}}">
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="edad" class="form-label">Edad</label>
                                <select class="form-control select2" id="edad" name="edad">
                                    @for ($i = 1; $i <= 70; $i++)
                                        <option value="{{$i}}">{{$i}} Años</option>
                                    @endfor
                                  </select>
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="peso" class="form-label">Peso</label>
                                <select class="form-control select2" id="peso" name="peso">
                                    @for ($i = 5; $i <= 140; $i++)
                                        <option value="{{$i}}">{{$i}} KG</option>
                                    @endfor
                                  </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required value="{{old('telefono')}}">
                            </div>
                        </div>
                        <div class="from-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="cinta" class="form-label">Cinta</label>
                                <select class="form-control select2" id="cinta" name="cinta">
                                    <option value="blanca">Blanca</option>
                                    <option value="naranja">Naranja</option>
                                    <option value="amarilla">Amarilla</option>
                                    <option value="amarilla_a">Amarilla avanzada</option>
                                    <option value="azul">Azul</option>
                                    <option value="azul_a">Azul avanzada</option>
                                    <option value="roja">Roja</option>
                                    <option value="roja_a">Roja avanzada</option>
                                    <option value="negra">Negra</option> 
                                  </select>
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="grado" class="form-label">Grado</label>
                                <select class="form-control select2" id="grado" name="grado">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{$i}}">{{$i}} Kup</option>
                                    @endfor
                                  </select>
                            </div>
                        </div>
                        <hr>
                        <h2 class="h4">Listado de Roles</h2>
                        <br>
                        @foreach ($roles as $rol)
                            <div>
                                <label>
                                @php
                                    //dd($user->hasAnyRole($rol));
                                @endphp
                                    <input type="checkbox" class="mr-1" value="{{ $rol->id }}" name="roles[]"> 
                                        <b>{{ $rol->name }}</b>
                                </label>
                            </div>
                        @endforeach


                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary btn-sm"> Guardar</button>
                        </div>
                    </form>
                {{-- </div> --}}
            </div>
        </div>  
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("#class_usuarios").addClass( "active" );
</script>
@endsection