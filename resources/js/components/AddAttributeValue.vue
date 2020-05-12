<template>
    <div>
        <form action="" @submit.prevent="addValueToAttribute">
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Значение (рус.)</label>
                        <input type="text"
                               class="form-control"
                               v-model="value_ru"
                               name="code"
                               placeholder="Введите индификатор атрибута">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Значение (укр.)</label>
                        <input type="text"
                               class="form-control"
                               v-model="value_ua"
                               name="code"
                               placeholder="Введите индификатор атрибута"
                        >
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Цена</label>
                        <input type="text"
                               class="form-control"
                               v-model="price"
                               name="code"
                               placeholder="Введите индификатор атрибута">
                    </div>
                </div>
                <div class="col-sm-2 d-flex flex-column-reverse align-content-end">
                    <div class="form-group">
                        <button class="btn btn-success form-control"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <h3 class="mt-3">Добавить / Удалить значение атрибута</h3>
        <div v-if="attributeValues.length > 0">
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
                <tr v-for="(item, index) in attributeValues">
                    <td>{{item.attribute_id}}</td>
                    <td>{{attribute.name_ru}}</td>
                    <td>{{item.value_ua}}</td>
                    <td>{{item.value_ru}}</td>
                    <td>{{item.price}}</td>
                    <td><i class="far fa-times-circle"
                           @click="deleteAttributeItem(item)"></i></td>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <button @click="saveAttributeValues" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div v-if="attributeValues.length === 0" class="fa-3x text-center">
            <i class="fas fa-spinner fa-pulse"></i>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['attribute'],
        data() {
            return {
                value_ru: '',
                value_ua: '',
                price: 0,
                attributeValues: []
            }
        }, mounted() {
            axios
                .get('/admin/attributeValues/' + this.attribute.id)
                .then(response => (
                    this.attributeValues = response.data.values
                ))
        },
        methods: {
            addValueToAttribute() {
                let newAttrValues = {
                    attribute_id: this.attribute.id,
                    value_ru: this.value_ru,
                    value_ua: this.value_ua,
                    price: this.price
                };

                if (this.value_ru && this.value_ua) {
                    this.attributeValues.push(newAttrValues);
                } else {
                    this.errors.push('Выберите значение атрибутов и цены')
                }
                this.value_ru = '';
                this.value_ua = '';
                this.price = 0;
            },
            saveAttributeValues() {
                axios.post('/admin/addAttributeValues/' + this.attribute.id,
                   JSON.stringify(this.attributeValues),
                    {
                        headers: {'Content-Type': 'application/json'}
                    }).then(function (response) {
                    console.log(response)
                })
            },
        }
    }
</script>

<style scoped>

</style>
