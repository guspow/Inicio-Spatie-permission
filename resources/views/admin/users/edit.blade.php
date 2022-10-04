@extends('layouts.app')
@section('estilos')
<!-- Custom styles for this page -->
<link href="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('ijaboCropTool/ijaboCropTool.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>  --}}
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li> 
        <li class="breadcrumb-item active" aria-current="page">Editar</li> 
@endsection
@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row col-lg-12">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary float-left">Editar Usuario</h6>
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
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-sm-3 text-center"> 
                                <div class="rounded-circle border d-flex justify-content-center align-items-center" style="width:100%;height:222px" alt="Avatar">
                                    @if (empty($user->foto))
                                        {{-- <i class="fas fa-user-alt fa-6x text-info"></i> --}}
                                        <img class="user_foto rounded-circle" src="{{asset('libs/sbadmin/img/undraw_rocket.svg')}}" style="width:100%;height:222px">
                                    @else
                                        <img class="user_foto rounded-circle" src="{{asset($user->foto)}}" style="width:100%;height:222px">
                                    @endif
                                </div>
                                <br>
                                @if ($user->id == auth()->user()->id)
                                    <div class="col-sm-12 text-center">
                                        <button type="button" id="foto" class="btn btn-primary btn-sm">Seleccionar Foto</button>
                                        <input type="file" class="form-control" id="archivo" name="archivo" value="{{old('archivo')}}" style="display:none">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <form id="frmDatos" method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required value="{{old('nombre',$user->name)}}">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="appaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="appaterno" name="appaterno" required value="{{old('appaterno',$user->appaterno)}}">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="apmaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="apmaterno" name="apmaterno" required value="{{old('apmaterno',$user->apmaterno)}}">
                            </div>
                        </div>
                        <div class="form-group row" style="height: 78px;">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{old('email',$user->email)}}">
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="edad" class="form-label">Edad</label>
                                <select class="form-control select2" id="edad" name="edad">
                                    @for ($i = 1; $i <= 70; $i++)
                                        <option value="{{$i}}" {{$user->edad == $i ? 'selected' : ''}}>{{$i}} Años</option>
                                    @endfor
                                  </select>
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="peso" class="form-label">Peso</label>
                                <select class="form-control select2" id="peso" name="peso">
                                    @for ($i = 5; $i <= 140; $i++)
                                        <option value="{{$i}}" {{$user->peso == $i ? 'selected' : '' }}>{{$i}} KG</option>
                                    @endfor
                                  </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono"  value="{{old('telefono',$user->telefono)}}">
                            </div>
                        </div>
                        <div class="from-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="cinta" class="form-label">Cinta</label>
                                <select class="form-control select2" id="cinta" name="cinta">
                                    <option value="blanca" {{$user->cinta == "blanca" ? 'selected' : '' }}>Blanca</option>
                                    <option value="naranja" {{$user->cinta == "naranja" ? 'selected' : '' }}>Naranja</option>
                                    <option value="amarilla" {{$user->cinta == "amarilla" ? 'selected' : '' }}>Amarilla</option>
                                    <option value="amarilla_a" {{$user->cinta == "amarilla_a" ? 'selected' : '' }}>Amarilla avanzada</option>
                                    <option value="azul" {{$user->cinta == "azul" ? 'selected' : '' }}>Azul</option>
                                    <option value="azul_a" {{$user->cinta == "azul_a" ? 'selected' : '' }}>Azul avanzada</option>
                                    <option value="roja" {{$user->cinta == "roja" ? 'selected' : '' }}>Roja</option>
                                    <option value="roja_a" {{$user->cinta == "roja_a" ? 'selected' : '' }}>Roja avanzada</option>
                                    <option value="negra" {{$user->cinta == "negra" ? 'selected' : '' }}>Negra</option> 
                                  </select>
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="grado" class="form-label">Grado</label>
                                <select class="form-control select2" id="grado" name="grado">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{$i}}" {{$user->grado == $i ? 'selected' : '' }}>{{$i}} Kup</option>
                                    @endfor
                                  </select>
                            </div>
                        </div>
                        @if (auth()->user()->hasRole(['Admin','Dueño']))
                            <hr>
                            <h2 class="h4">Listado de Roles</h2>
                            <br>
                            
                            @foreach ($roles as $rol)
                                <div>
                                    <label>
                                    @php
                                        //dd($user->hasAnyRole($rol));
                                    @endphp
                                        <input type="checkbox" class="mr-1" value="{{ $rol->id }}" name="roles[]" @if($user->hasAnyRole($rol)) checked @endif> 
                                            <b>{{ $rol->name }}</b>
                                    </label>
                                </div>
                            @endforeach
                        @endif

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
<script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>
<script>
    $("#foto").on('click', function(){
        $("#archivo").click();
    });

    $("#class_usuarios").addClass( "active" );
    
    $('#archivo').ijaboCropTool({
        preview : '.user_foto',
        setRatio:1,
        buttonsText:['Guardar','Cerrar'],
        buttonsColor:['#4D73DF','#ee5155', -15],
        //allowedExtensions: ['jpg', 'jpeg','png'],
        processUrl:"{{ route("user.foto")}} " ,
        withCSRF:['_token','{{ csrf_token() }}'],
        onSuccess:function(message, element, status){
             //alert(message);
          },
          onError:function(message, element, status){
            //alert(message);
          }
       });

</script>
@endsection