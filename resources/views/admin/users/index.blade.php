@extends('layouts.app')
@section('estilos')
<!-- Custom styles for this page -->
<link href="{{asset('libs/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('libs/sbadmin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>  --}}
        <li class="breadcrumb-item active" aria-current="page">Usuarios</li> 
@endsection
@section('contenido')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
        </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>opcion</th>
                        </tr>
                    </thead>
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

            $("#class_usuarios").addClass( "active" );

            $('#dataTable').DataTable({
                "ajax":"{{route('datatable.user')}}",
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {
                        targets: -1,
                        className: 'dt-center',
                        data: 'ident',
                        "render": function ( data, type, row, meta ) {
                            var url = '{{ route("users.edit", ":id") }}';
                            url = url.replace(':id', data);
                            return `<a href="${url}" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a>`;
                        }
                    }
                ],
                "language": {
                    "lengthMenu": "Mostrar "+
                                `<select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value = '10'>10</option>
                                    <option value = '25'>25</option>
                                    <option value = '50'>50</option>
                                    <option value = '100'>100</option>
                                    <option value = '-1'>Todos</option>
                                </select>`
                                +" registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros encontrados",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
        });
    </script>
@endsection