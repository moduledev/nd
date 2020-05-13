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
                        <form action="{{route('attribute.add')}}" method="POST" class="admin-form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" class="form-control" value="{{$attribute->code}}" name="code" placeholder="Введите индификатор атрибута">
                                    </div>
                                    @error('code')
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Название (на рус.)</label>
                                        <input type="text" name="name_ru" value="{{$attribute->name_ru}}" class="form-control" placeholder="Введите название на рус.">
                                    </div>
                                    @error('name_ru')
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('name_ru') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Название (на укр.)</label>
                                        <input type="text" name="name_ua" value="{{$attribute->name_ua}}" class="form-control" placeholder="Введите название на укр.">
                                    </div>
                                    @error('name_ua')
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('name_ua') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-success">Изменить</button>
                        </form>
                        <add-value-to-attribute :attribute="{{$attribute}}"></add-value-to-attribute>
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
