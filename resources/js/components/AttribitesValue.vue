<template>
    <div class="col-12 w-100 d-flex flex-row flex-wrap  ">
        <div class="form-group col-sm-12 w-100">
            <label>Добавить атрибут</label>
            <select class="custom-select" v-model="attributeSelected" @change="getAttributeId">
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
                <select class="custom-select" :class="{'is-invalid': errors.length > 0}" v-model="attributeValueRu" @change="errors = []">
                    <option value="">Выберите значение</option>
                    <option v-for="value in attributeValues" :value="value.value_ru" :key="value.id">
                        {{value.value_ru}}
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
                        {{value.value_ua}}
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
                    <li v-for="error in errors">{{error}}</li>
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
                                <td>{{item.attribute_id}}</td>
                                <td>{{attributeName}}</td>
                                <td>{{item.value_ua}}</td>
                                <td>{{item.value_ru}}</td>
                                <td>{{item.price}}</td>
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
</template>
<script>
    import axios from 'axios';
    import _ from 'lodash';

    export default {
        props: ['attributes'],
        data() {
            return {
                attributeSelected: '',
                attributeValueRu: '',
                attributeValueUa: '',
                attributeValues: [],
                attributePrice: 0,
                productAttributes: [],
                attributeName: '',
                errors: [],
            }
        },
        methods: {
            getAttributeId() {
                axios
                    .get('/admin/attributeValues/' + this.attributeSelected)
                    .then(responce => (
                        this.attributeValues = responce.data.values,
                        this.attributeName = responce.data.attributeName
                    ))
            },
            addAttributeToProduct() {
                let productAttributes = {
                    attribute_id: this.attributeSelected,
                    value_ru: this.attributeValueRu,
                    value_ua: this.attributeValueUa,
                    price: this.attributePrice
                };

                if(this.attributeValueRu && this.attributeValueUa && this.attributePrice){
                    this.productAttributes.push(productAttributes);
                } else {
                    this.errors.push('Выберите значение атрибутов и цены')
                }
                this.attributeValueRu = '';
                this.attributeValueUa = '';
                this.attributePrice = 0;
            },
            deleteAttributeItem(itemForDelete) {
                this.productAttributes = _.remove(this.productAttributes, function (item) {
                    return item !== itemForDelete;
                })
            }
        }
    }
</script>
