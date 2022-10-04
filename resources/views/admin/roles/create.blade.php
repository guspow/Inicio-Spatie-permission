@extends('layouts.app')
@section('estilos')
<!-- Custom styles for this page -->
<link href="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>  --}}
        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li> 
        <li class="breadcrumb-item active" aria-current="page">Crear Rol</li> 
@endsection
@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row col-lg-12">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary float-left">Crear Rol</h6>
            </div>
            <div class="col-lg-6">
                <a href="{{route('admin.roles.index')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
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
                    <form id="frmDatos" method="POST" action="{{route('admin.roles.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del rol" required value="{{old('nombre')}}">
                            </div>
                        </div>
                      
                        <hr>
                        <h2 class="h3">Lista de permisos</h2>

                        @foreach ($permissions as $permission)

                            <div>
                                <label>
                                    <input type="checkbox" class="mr-1" value="{{ $permission->id }}" name="permissions[]"> 
                                        <b>{{ $permission->description }}</b>
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
    $("#class_roles").addClass( "active" );
</script>
@endsection