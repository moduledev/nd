@extends('admin.layouts.app')
@section('styles')
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Изменить данные администратора</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

                {{ Breadcrumbs::render('admin-edit', $role->name) }}

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Основная информация:</h3>
                    </div>
                    <form action="{{route('role.update', $role->id)}}" method="POST" class="admin-form"
                          enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="name" value="{{$role->name}}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Название роли"
                                       required autofocus>
                                @error('name')
                                <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-12 col-md-4">
                <form action="{{route('admin.delete', $role->id)}}">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger">Удалить роль <i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="card card-default mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Управление разрешениями</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('role.update', $role->id)}}" class="d-flex flex-wrap flex-row" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    {{method_field('PUT')}}
                                    @foreach($permissions->chunk(7) as $chunk)
                                        <ul>
                                            @foreach($chunk as $permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input " type="checkbox"
                                                           id="{{$permission->id}}"
                                                           @if($userPermissions->contains('name',$permission->name))checked
                                                        @endif>
                                                    <label for="{{$permission->id}}"
                                                           class="custom-control-label">{{$permission->name}}</label>
                                                </div>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                    <div class="card-footer w-100">
                                        <button type="submit" class="btn btn-primary">Изменить</button>
                                    </div>
                                </form>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->

@endsection
@section('scripts')

@endsection
