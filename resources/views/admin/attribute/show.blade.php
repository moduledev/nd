@extends('admin.layouts.app')
@section('styles')
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

                {{ Breadcrumbs::render('attribute-edit', $attribute->name_ru) }}

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
                        <h3 class="card-title">Редактировать атрибут:</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
