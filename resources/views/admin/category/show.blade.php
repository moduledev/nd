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
                <h1 class="m-0 text-dark">Просмотр категории</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

                {{ Breadcrumbs::render('category-show', $category->name_ru) }}

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
                        <h3 class="card-title">Просмтор категории: </h3>
                    </div>
                    <div class="card-body">
                        <h3>Название категории: {{$category->name_ru}}</h3>
                        <ul>
                            <li>Название категории (рус.) {{$category->name_ru}}</li>
                            <li>Название категории (укр.) {{$category->name_ua}}</li>
                        </ul>
                        <h3 class="mt-3">Ассоциированные с категорией товары</h3>
                        <table id="adminsList" class="table table-bordered table-hover dataTable admins-table"
                               role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row" class="text-center">
                                <th>ID</th>
                                <th>Название (рус.)</th>
                                <th><i class="fas fa-image"></i></th>
                                <th>Операция</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categoryProducts as $product)
                                <tr>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td class="text-center">
                                        {{$product->base_name}}
                                    </td>
                                    <td class="text-center">
                                        <img class="img-circle elevation-2 img-responsive rounded-circle admins-table__image" src="{{asset('storage/'.$product->images->first()['path'])}}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('product.show', $product->id)}}">
                                            <button class="btn btn-success"><i class="fas fa-eye"></i></button>
                                        </a>
                                        <a href="{{route('product.edit', $product->id)}}">
                                            <button class="btn btn-primary "><i class="fas fa-user-edit"></i></button>
                                        </a>
                                    </td>
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
