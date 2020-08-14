<template>
    <div class="card card-primary card-outline card-outline-tabs w-100">
        <div v-if="!showLoader">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                           href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                           aria-selected="false">Основная информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                           href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                           aria-selected="false">Атрибуты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="custom-tabs-four-messages-tab" data-toggle="pill"
                           href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                           aria-selected="true">Изображение товара</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent w-100">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                         aria-labelledby="custom-tabs-four-home-tab">
                        <form @submit.prevent="submitForm" enctype="multipart/form-data"
                              class="admin-form w-100 d-flex flex-row flex-wrap">


                            <div v-if="showAlert" class="alert-block w-100">
                                <button type="button" class="close" @click="closeAlert">×</button>
                                <strong>Товар не был добавлен</strong>
                                <div class="col-12">
                                    <ul>
                                        <li v-for="(error, index) in errors" :key="index">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
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
                                    <div class="form-group w-100">

                                        <label>Цена</label>
                                        <input type="text" name="price"
                                               v-model="price"
                                               class="form-control"
                                               placeholder="Цена">
                                    </div>
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
                                            <option v-for="category in categories"
                                                    :value="category.id"
                                                    :key="category.id"
                                            >
                                                {{ category.name_ru }}
                                            </option>
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
                                        <label class="custom-control-label"
                                               for="available_checkbox">Опубликовать</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-success" type="submit">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                         aria-labelledby="custom-tabs-four-profile-tab">
                        <div class="col-12 w-100 d-flex flex-row flex-wrap  ">
                            <div class="form-group col-sm-12 w-100">
                                <label>Добавить атрибут</label>
                                <select class="custom-select"
                                        v-model="attributeSelected"
                                        :class="{'is-invalid': attributeSelected.length === 0}"
                                        @change="getAttributeId">
                                    <option value="">Выберите атрибут</option>
                                    <option v-for="attribute in attributes" :value="attribute.id" :key="attribute.id">
                                        {{attribute.name_ru}}
                                    </option>
                                </select>
                            </div>

                            <div v-if="attributeSelected" class=" col-sm-12 p-0 d-flex flex-row flex-wrap">
                                <div class="form-group col-sm-4">
                                    <label>Значение атрибута</label>
                                    <svg class="icon" style="width: 25px; height: 15px">
                                        <use xlink:href="#russia"/>
                                    </svg>
                                    <input type="text"
                                           class="form-control"
                                           v-model="attributeValueRu">
                                    <label v-if="attributeValues.length > 0">Выбрать из предустановленых
                                        значений</label>
                                    <select class="custom-select"
                                            v-if="attributeValues.length > 0"
                                            :class="{'is-invalid': errors.length > 0}"
                                            v-model="attributeValueRu">
                                        <option value="">Выберите значение</option>
                                        <option v-for="(value, index) in attributeValues" :value="value.value_ru"
                                                :key="value.id">
                                            {{value.value_ru}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Значение атрибута</label>
                                    <svg class="icon" style="width: 25px; height: 15px">
                                        <use xlink:href="#ukraine"/>
                                    </svg>
                                    <input type="text"
                                           class="form-control"
                                           v-model="attributeValueUa">
                                    <label v-if="attributeValues.length > 0">Выбрать из предустановленых
                                        значений</label>
                                    <select class="custom-select"
                                            v-if="attributeValues.length > 0"
                                            :class="{'is-invalid': errors.length > 0}"
                                            v-model="attributeValueUa">
                                        <option value="">Выберите значение</option>
                                        <option v-for="(value, index) in attributeValues" :value="value.value_ua"
                                                :key="value.id">
                                            {{value.value_ua}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="inputAttrPrice">Цена</label>
                                    <input v-model="attributePrice"
                                           type="text" class="form-control"
                                           :class="{'is-invalid': errors.length > 0}" id="inputAttrPrice"
                                           @change="errors = []"
                                           :disabled="price > 0"
                                           placeholder="Enter ...">
                                </div>
                                <div class="col-12">
                                    <ul v-if="errors">
                                        <li v-for="error in errors">{{error}}</li>
                                    </ul>
                                    <div class="btn btn-success" :class="{disabled: errors.length > 0}"
                                         :disabled="errors.length > 0" @click="addAttributeToProduct">Добавить <i
                                        class="fas fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="form-group col-12 mt-5"
                                 v-if="attributeSelected || productAttributes.length > 0">
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
                                                <td>{{item.attribute_id}}</td>
                                                <td>{{item.attribute_name}}</td>
                                                <td>{{item.value_ru}}</td>
                                                <td>{{item.value_ua}}</td>
                                                <td>{{item.price}}</td>
                                                <td><i class="far fa-times-circle"
                                                       @click="deleteAttributeItem(item)"></i></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade " id="custom-tabs-four-messages" role="tabpanel"
                         aria-labelledby="custom-tabs-four-messages-tab">
                        <div class="w-100">
                            <div class="">
                                <input type="file" id="files" ref="files" multiple @change="onFileSelected">
                                <div class="images-block d-flex justify-content-center align-items-center mb-4"
                                     @click="addFiles">
                                    <p>Нажмите чтобы добавить изображения товара</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row flex-wrap ">
                                <div v-for="(file, index) in previewImages"
                                     class="d-flex flex-column justify-content-center align-items-center text-center image-wrapper">

                                    <img class="img img-fluid image-preview" :src="file" alt="">

                                    <label class="imageCheckbox">Главное изображение</label>

                                    <input type="checkbox"
                                           class="imageCheckbox"
                                           :value="index"
                                           :class="{active: isChecked.indexOf(index) !== -1}"
                                           v-model="isChecked"
                                           :disabled="isChecked.length >= max && isChecked.indexOf(index) == -1">

                                    <span class="btn btn-danger mt-2" @click="deleteElement(index)">Удалить<i
                                        class="fas fa-minus-circle"></i></span>
                                </div>

                                <div v-for="(img, index) in productFull.images"
                                     class="d-flex flex-column justify-content-center align-items-center text-center image-wrapper">

                                    <img class="img img-fluid image-preview" v-if="img.id" :src="'/storage/' + img.path"
                                         alt="">
                                    <label class="imageCheckbox">Главное изображение</label>

                                    <input type="checkbox"
                                           class="imageCheckbox"
                                           :value="index"
                                           :class="{active: isChecked.indexOf(index) !== -1}"
                                           v-model="isChecked"
                                           :disabled="isChecked.length >= max && isChecked.indexOf(index) == -1">

                                    <span class="btn btn-danger mt-2" @click="deleteElement(index)">Удалить<i
                                        class="fas fa-minus-circle"></i></span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div v-if="showLoader" class="fa-3x text-center mt-5 mb-5">
                <i class="fas fa-spinner fa-spin"></i>
            </div>
        </div>
        <!-- /.card -->
    </div>
</template>

<script>
    import axios from 'axios';
    import _ from "lodash";

    export default {
        props: ['product'],
        data() {
            return {
                productFull: null,
                name_ru: '',
                name_ua: '',
                price: 0,
                categories: [],
                attributes: [],
                productCategories: [],
                description_ru: '',
                description_ua: '',
                productAttributes: [],
                composition_ru: '',
                composition_ua: '',
                images: [],
                previewImages: [],
                isChecked: [],
                urls: [],
                max: 1,
                available: 1,
                gluten: 0,
                lactose: 0,

                selectedOption: '',

                attributeSelected: '',
                attributeValueRu: '',
                attributeValueUa: '',
                attributeValues: [],
                attributePrice: 0,
                attributeName: '',
                errors: [],
                showAlert: false,
                showLoader: true,


            }
        },
        mounted() {
            const vm = this;
            const product = axios
                .get('/admin/fullproduct/' + this.product)
                .then(function (response) {
                    vm.productFull = response.data;
                    let pf = response.data;
                    vm.name_ua = pf.name_ua;
                    vm.name_ru = pf.name_ru;
                    vm.price = pf.price;
                    vm.description_ru = pf.description_ru;
                    vm.description_ua = pf.description_ua;
                    vm.composition_ua = pf.composition_ua;
                    vm.composition_ru = pf.composition_ru;
                    vm.available = pf.available;
                    vm.gluten = pf.gluten;
                    vm.lactose = pf.lactose;
                    //assign product categories
                    vm.productCategories = pf.categories.map(item => {
                        return item.id;
                    });
                    //assign product attributes
                    vm.productAttributes = pf.attributes.map(item => {
                        return {
                            attribute_id: item.id,
                            attribute_name: item.name_ru,
                            price: item.pivot.price,
                            value_ru: item.pivot.value_ru,
                            value_ua: item.pivot.value_ua,
                        }
                    });
                    vm.showLoader = false;

                });
            const catesgory = axios
                .get('/admin/category')
                .then(response => (this.categories = response.data));
            const attr = axios
                .get('/admin/attributes')
                .then(response => (this.attributes = response.data))
        },
        methods: {
            onFileSelected(event) {
                let arr = [];
                let images = [];
                Array.from(event.target.files).map(function (item, index) {
                    let reader = new FileReader();
                    reader.onload = function () {
                        arr.push(reader.result);
                        images.push(item);
                        // images.push({img:item, result:render.result});
                    };
                    reader.readAsDataURL(event.target.files[index]);
                });
                console.log(arr)
                console.log(images)
                this.previewImages = arr;

                let uploadedFiles = this.$refs.files.files;
                for (let i = 0; i < uploadedFiles.length; i++) {
                    const img = {};
                    let reader = new FileReader();
                    reader.onload = function () {
                        // images.push(uploadedFiles[i]);
                        img.imgshow = uploadedFiles[i];
                    };
                    reader.readAsDataURL(event.target.files[uploadedFiles[i]]);
                    img.imgFile = uploadedFiles[i];
                    // this.images.push(uploadedFiles[i]);
                    this.images.push(img);
                }
                console.log(this.images)

            },
            deleteElement(index) {
                let previewImages = this.previewImages;
                let images = this.images;
                previewImages.splice(index, 1);
                images.splice(index, 1);
                this.previewImages = previewImages;
                this.images = images;
                if (this.isChecked[0] === index) this.isChecked = [];
            },
            getAttributeId() {
                axios
                    .get('/admin/attributeValues/' + this.attributeSelected)
                    .then(responce => (
                        this.attributeValues = responce.data.values, this.attributeName = responce.data.attributeName
                    ))
            },
            addAttributeToProduct() {
                let productAttributes = {
                    attribute_id: this.attributeSelected,
                    attribute_name: this.attributeName,
                    value_ru: this.attributeValueRu,
                    value_ua: this.attributeValueUa,
                    price: this.attributePrice
                };

                if (this.attributeValueRu && this.attributeValueUa) {
                    this.productAttributes.push(productAttributes);
                } else {
                    this.errors.push('Выберите значение атрибутов и цены')
                }
                this.attributeValueRu = '';
                this.attributeValueUa = '';
                this.attributePrice = 0;
            },
            deleteAttributeItem(key) {
                this.productAttributes.splice(key, 1);
            },
            addFiles() {
                this.$refs.files.click();
            },
            closeAlert() {
                this.showAlert = false;
            },
            submitForm() {
                const vm = this;
                const formData = new FormData();

                if (this.images.length > 0) {
                    for (let i = 0; i < this.images.length; i++) {
                        let file = this.images[i];
                        formData.append('productImages[' + i + ']', file);
                    }
                }

                if (this.productAttributes.length > 0) {
                    for (let i = 0; i < this.productAttributes.length; i++) {
                        let attribute = this.productAttributes[i];
                        formData.append('productAttributes[' + i + ']', JSON.stringify(attribute));
                    }
                }

                formData.append('name_ru', this.name_ru);
                formData.append('name_ua', this.name_ua);
                formData.append('price', this.price);
                formData.append('description_ru', this.description_ru);
                formData.append('description_ua', this.description_ua);
                formData.append('composition_ru', this.composition_ru);
                formData.append('composition_ua', this.composition_ua);
                formData.append('productCategories', this.productCategories);
                formData.append('available', this.available ? 1 : 0);
                formData.append('gluten', this.gluten ? 1 : 0);
                formData.append('lactose', this.lactose ? 1 : 0);
                formData.append('mainImage', this.isChecked);

                axios.post(
                    '/admin/product/store',
                    formData,
                    {
                        headers: {'Content-Type': 'multipart/form-data'}
                    }).then(function (response) {
                    if (!response.data.status && response.data.messages) {
                        vm.errors = [];
                        response.data.messages.map((item) => {
                            vm.errors.push(item);
                            vm.showAlert = true;
                        })
                    } else {
                        window.location.assign('/admin/products')
                    }
                })
            }

        }
    }
</script>

<style scoped>
    .image-wrapper {
        width: 200px;
        height: auto;
        margin-right: 15px;
    }

    input[type="file"] {
        position: absolute;
        top: -500px;
    }

    .images-block {
        border: 1px dashed #0c5460;
        padding: 25px 0 20px 0;
        cursor: pointer;
    }

    .alert-block {
        background-color: red;
        color: #fff;
        padding: 15px;
        margin: 0 0 25px 0;
        border-radius: 10px;
    }
</style>


