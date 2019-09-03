@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Все пользователи</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">
                    <h3 class="card-title">Администраторы сайта:</h3>
                </div>
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="adminsList" class="table table-bordered table-hover dataTable" role="grid"
                                       aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Имя</th>
                                            <th>E-mail</th>
                                            <th>Аватар</th>
                                            <th>Операция</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td></td>
                                            <td><button class="btn btn-success"> <i class="fas fa-eye"></i> </button></td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Имя</th>
                                            <th rowspan="1" colspan="1">E-mail</th>
                                            <th rowspan="1" colspan="1">Аватар</th>
                                            <th rowspan="1" colspan="1">Операция</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('scripts')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#adminsList').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                },
            });
        } );
    </script>
@endsection
