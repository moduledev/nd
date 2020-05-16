@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('page-title')
    <title>CarefullDeserts - {{$pageTitle}}</title>
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Редактировать атрибут</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

                {{ Breadcrumbs::render('attribute-show', $attribute->name_ru) }}

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid" id="app">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать атрибут: </h3>
                    </div>
                    <div class="card-body">
                        <h3>Название атрибута: {{$attribute->name_ru}}</h3>
                        <ul>
                            <li>Индификатор атрибута {{$attribute->code}}</li>
                            <li>Название атрибута (рус.) {{$attribute->name_ru}}</li>
                            <li>Название атрибута (укр.) {{$attribute->name_ua}}</li>
                        </ul>
                        <table id="adminsList" class="table table-bordered table-hover dataTable admins-table"
                               role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row" class="text-center">
                                <th>ID</th>
                                <th>Название (рус.)</th>
                                <th>Название (укр.)</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($values as $value)
                                <tr>
                                    <td class="text-center">{{$value->id}}</td>
                                    <td class="text-center">{{$value->value_ru}}</td>
                                    <td class="text-center">{{$value->value_ua}}</td>
                                    <td class="text-center">{{$value->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Название (рус.)</th>
                                <th>Название (укр.)</th>
                                <th>Цена</th>
                            </tr>
                            </tfoot>
                        </table>
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
        $(document).ready(function () {
            $('#adminsList').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                },
            });
        });
    </script>
@endsection
