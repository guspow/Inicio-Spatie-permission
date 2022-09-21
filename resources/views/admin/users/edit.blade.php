@extends('layouts.app')
@section('estilos')
<!-- Custom styles for this page -->
<link href="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>  --}}
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li> 
        <li class="breadcrumb-item active" aria-current="page">Editar</li> 
@endsection
@section('contenido')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Usuario</h6>
    </div> 
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="p-5"> --}}
                    <form id="frmDatos" method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre',$user->name)}}">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control" id="appaterno" name="appaterno" placeholder="Apellido Paterno" value="{{old('nombre',$user->name)}}">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control" id="apmaterno" name="apmaterno" placeholder="Apellido Materno" value="{{old('nombre',$user->name)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{old('nombre',$user->email)}}">
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary"> Guardar</button>
                        </div>
                    </form>
                {{-- </div> --}}
            </div>
        </div>  
    </div>
</div>
@endsection
@section('scripts')
@endsection