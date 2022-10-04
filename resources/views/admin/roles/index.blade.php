@extends('layouts.app')
@section('estilos')
<!-- Custom styles for this page -->
<link href="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>  --}}
        <li class="breadcrumb-item active" aria-current="page">Roles</li> 
@endsection
@section('contenido')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row col-lg-12">
            <div class="col-lg-6">
                <h6 class="m-0 font-weight-bold text-primary float-left">Lista de Roles</h6>
            </div>
            <div class="col-lg-6">
                <a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Agregar</span>
                </a>
            </div> 
        </div>        


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="roles" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td width="10px">
                                    <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-circle btn-sm btn-primary" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td width="10px">
                                    @if ($role->id > 4)
                                    <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST" id='destroy_{{$role->id}}'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-circle btn-sm btn-danger" onClick="javascript:cancelar('{{$role->id}}')" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('libs/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('libs/sbadmin/vendor/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
             $("#class_roles").addClass( "active" );
        });

        function cancelar(role_id){
            Swal.fire({
                html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15 mx-5">' +
                '<h4>¿ Eliminar Rol ?</h4>' +
                '<p class="text-muted mx-4 mb-0">Ya no podrá ser recuperado</p>' +
                '</div>' +
                '</div>',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                confirmButtonClass:  'btn btn-danger w-xs mr-4 mb-1 me-2 mb-1',
                cancelButtonClass:  'btn btn-primary w-xs me-2 mb-1',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                    $("#destroy_"+role_id).submit();
                }
            });
        }
    </script>
@endsection