@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Список товаров</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

                {{ Breadcrumbs::render('products') }}

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Список доступных товаров:</h3>
                        <a class="btn btn-info" href="{{route('product.create')}}" style="float: right"><i
                                class="fas fa-plus"></i> Добавить товар</a>
                    </div>
                    <div class="card-body">
                        <table id="productList" class="table table-bordered table-hover dataTable admins-table "
                               role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row" class="text-center">
                                <th>ID</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th><i class="fas fa-image"></i></th>
                                <th>Операция</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td class="text-center">{{$product->base_name}}</td>
                                    <td class="text-center">
                                        @foreach($product->categories as $category)
                                            <a href="{{route('category.show', $category->id)}}"
                                               class="mr-1">{{$category->name_ru}}</a>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <img
                                            class="img-circle elevation-2 img-responsive rounded-circle admins-table__image"
                                            src="@if($product->images->first()) {{asset('storage/'.$product->images->first()['path'])}} @else  @endif"
                                            alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="">
                                            <button class="btn btn-success"><i class="fas fa-eye"></i></button>
                                        </a>
                                        <a href="{{route('product.edit', $product->id)}}">
                                            <button class="btn btn-primary "><i class="fas fa-user-edit"></i></button>
                                        </a>
                                        <form action="{{route('product.delete', $product->id)}}" method="POSt">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger"><i class="fas fa-eye"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <th rowspan="1" colspan="1">ID</th>
                                <th rowspan="1" colspan="1">Название</th>
                                <th rowspan="1" colspan="1">Операция</th>
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
            $('#productList').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                },
            });
        });
    </script>
@endsection
