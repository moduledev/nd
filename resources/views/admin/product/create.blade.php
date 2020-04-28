@extends('admin.layouts.app')
@section('styles')
{{--    <link rel="stylesheet" href="{{asset('adminlte/plugins/dropzone-5.7.0/dist/min/dropzone.min.css')}}">--}}
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Добавить товар</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{ Breadcrumbs::render('product-create') }}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div hidden>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="ukraine" viewBox="0 0 512 512">
                <title>ukraine</title>
                <rect y="85.337" style="fill:#FFDA44;" width="512" height="341.326"/>
                <rect y="85.337" style="fill:#338AF3;" width="512" height="170.663"/>
            </symbol>
            <symbol id="russia" viewBox="0 0 512 512">
                <title>russia</title>
                <polygon style="fill:#F0F0F0;"
                         points="0,85.33 0,199.107 0,312.885 0,426.662 512,426.662 512,312.885 512,199.107 512,85.33 "/>
                <rect y="85.333" style="fill:#0052B4;" width="512" height="341.337"/>
                <rect y="85.333" style="fill:#F0F0F0;" width="512" height="113.775"/>
                <rect y="312.884" style="fill:#D80027;" width="512" height="113.775"/>
            </symbol>
        </svg>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row" id="app">
                    <add-new-product inline-template>
                        <div class="card card-primary card-outline card-outline-tabs w-100">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Основная информация</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Атрибуты</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="true">Изображение товара</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent w-100">
                                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <form  @submit.prevent="submitForm" enctype="multipart/form-data" class="dropzone admin-form w-100 d-flex flex-row flex-wrap" style="padding-bottom: 40px; border: none">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-shopping-bag"></i></span>
                                                    </div>
                                                    <input type="text" name="base_name"
                                                           v-model="name_ru"
                                                           class="form-control"
                                                           :class="{'is-invalid': name_ru.length === 0}"
                                                           placeholder="Название товара (на русском)"
                                                           required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-shopping-bag"></i></span>
                                                    </div>
                                                    <input type="text" name="name_ua"
                                                           v-model="name_ua"
                                                           class="form-control"
                                                           :class="{'is-invalid': name_ua.length === 0}"
                                                           placeholder="Название товара (українською)"
                                                           required>

                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" name="price"
                                                           v-model="price"
                                                           class="form-control"
                                                           :class="{'is-invalid': price === 0}"
                                                           placeholder="Цена"
                                                           required >
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <div class="form-group w-100">
                                                        <label>Категория</label>
                                                        <select multiple name="categories[]"
                                                                v-model="productCategories"
                                                                :class="{'is-invalid': productCategories.length === 0}"
                                                                class="custom-select form-control" required>
                                                            <option v-for="category in categories" :value="category.id" :key="category.id">@{{ category.name_ru }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="form-group w-100">
                                                        <label>Описание товара (на русском)</label>

                                                        <svg class="icon" style="width: 25px; height: 15px">
                                                            <use xlink:href="#russia"/>
                                                        </svg>
                                                        <textarea name="description_ru" class="form-control" rows="3"
                                                                  :class="{'is-invalid': description_ru.length === 0}"
                                                                  v-model="description_ru"
                                                                  placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="form-group w-100">
                                                        <label>Описание товара (українською)</label>
                                                        <svg class="icon" style="width: 25px; height: 15px">
                                                            <use xlink:href="#ukraine"/>
                                                        </svg>
                                                        <textarea name="description_ua" class="form-control" rows="3"
                                                                  :class="{'is-invalid': description_ua.length === 0}"
                                                                  v-model="description_ua"
                                                                  placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="form-group w-100">
                                                        <label>Состав товара (на русском)</label>

                                                        <svg class="icon" style="width: 25px; height: 15px">
                                                            <use xlink:href="#russia"/>
                                                        </svg>
                                                        <textarea name="composition_ru" class="form-control" rows="3"
                                                                  v-model="composition_ru"
                                                                  :class="{'is-invalid': composition_ru.length === 0}"
                                                                  placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="form-group w-100">
                                                        <label>Состав товара (українською)</label>
                                                        <svg class="icon" style="width: 25px; height: 15px">
                                                            <use xlink:href="#ukraine"/>
                                                        </svg>
                                                        <textarea name="composition_ua" class="form-control" rows="3"
                                                                  v-model="composition_ua"
                                                                  :class="{'is-invalid': composition_ua.length === 0}"
                                                                  placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                               v-model="gluten"
                                                               id="gluten_checkbox" name="gluten">
                                                        <label for="gluten_checkbox" class="custom-control-label">Содержит
                                                            глютен</label>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="lactose_checkbox"
                                                               v-model="lactose"
                                                               type="checkbox" name="lactose">
                                                        <label class="custom-control-label" for="lactose_checkbox">Содержит
                                                            лактозу</label>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="available_checkbox"
                                                               v-model="available"
                                                               type="checkbox" name="available" checked>
                                                        <label class="custom-control-label" for="available_checkbox">Опубликовать</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-success" type="submit" style="position: absolute; bottom: 10px; left: 50px">Сохранить</button>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
{{--                                        <attributes-value :attributes="attributes"></attributes-value>--}}
                                        <div class="col-12 w-100 d-flex flex-row flex-wrap  ">
                                            <div class="form-group col-sm-12 w-100">
                                                <label>Добавить атрибут</label>
                                                <select class="custom-select"
                                                        v-model="attributeSelected"
                                                        :class="{'is-invalid': attributeSelected.length === 0}"
                                                        @change="getAttributeId">
                                                    <option value="">Выберите атрибут</option>
                                                    <option v-for="attribute in attributes" :value="attribute.id" :key="attribute.id">
                                                        @{{attribute.name_ru}}
                                                    </option>
                                                </select>
                                            </div>

                                            <div v-if="attributeSelected" class=" col-sm-12 p-0 d-flex flex-row flex-wrap">
                                                <div class="form-group col-sm-4">
                                                    <label>Значение атрибута</label>
                                                    <svg class="icon" style="width: 25px; height: 15px">
                                                        <use xlink:href="#russia"/>
                                                    </svg>
                                                    <select class="custom-select" :class="{'is-invalid': errors.length > 0}" v-model="attributeValueRu" @change="errors = []">
                                                        <option value="">Выберите значение</option>
                                                        <option v-for="value in attributeValues" :value="value.value_ru" :key="value.id">
                                                            @{{value.value_ru}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Значение атрибута</label>
                                                    <svg class="icon" style="width: 25px; height: 15px">
                                                        <use xlink:href="#ukraine"/>
                                                    </svg>
                                                    <select class="custom-select" :class="{'is-invalid': errors.length > 0}" v-model="attributeValueUa" @change="errors = []">
                                                        <option value="">Выберите значение</option>
                                                        <option v-for="value in attributeValues" :value="value.value_ua" :key="value.id">
                                                            @{{value.value_ua}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="inputAttrPrice">Цена</label>
                                                    <input v-model="attributePrice" type="text" class="form-control" :class="{'is-invalid': errors.length > 0}" id="inputAttrPrice"
                                                           @change="errors = []"
                                                           placeholder="Enter ...">
                                                </div>
                                                <div class="col-12">
                                                    <ul v-if="errors">
                                                        <li v-for="error in errors">@{{error}}</li>
                                                    </ul>
                                                    <div class="btn btn-success" :class="{disabled: errors.length > 0}" :disabled="errors.length > 0"  @click="addAttributeToProduct">Добавить <i class="fas fa-plus"></i></div>
                                                </div>
                                                <div class="col-12 mt-5" v-if="productAttributes.length > 0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Атрибуты товара</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body table-responsive ">
                                                            <table class="table table-hover text-nowrap">
                                                                <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Атрибут</th>
                                                                    <th>Значение (рус.)</th>
                                                                    <th>Значение (укр.)</th>
                                                                    <th>Цена</th>
                                                                    <th><i class="fas fa-bolt"></i></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr v-for="(item, index) in productAttributes">
                                                                    <td>@{{item.attribute_id}}</td>
                                                                    <td>@{{attributeName}}</td>
                                                                    <td>@{{item.value_ua}}</td>
                                                                    <td>@{{item.value_ru}}</td>
                                                                    <td>@{{item.price}}</td>
                                                                    <td><i class="far fa-times-circle" @click="deleteAttributeItem(item)"></i></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade " id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
{{--                                        <image-product-upload @getimages="getImages"></image-product-upload>--}}
                                        <div class="w-100">
                                            <div class="">
                                                <input type="file" multiple @change="onFileSelected">
                                            </div>
                                            <div class="d-flex flex-row flex-wrap ">
                                                <div v-for="(url, index) in urls" class="d-flex flex-column justify-content-center align-items-center text-center image-wrapper">

                                                    <img class="img img-fluid image-preview" :src="url" alt="">

                                                    <label for="" class="imageCheckbox">Главное изображение</label>

                                                    <input type="checkbox"
                                                           :value="index"
                                                           class="imageCheckbox"
                                                           :class="{active: isChecked.indexOf(index) !== -1}"
                                                           v-model="isChecked" :disabled="isChecked.length >= max && isChecked.indexOf(index) == -1">

                                                    <span class="btn btn-danger mt-2" @click="deleteElement(index)">Удалить<i class="fas fa-minus-circle"></i></span>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </add-new-product>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
