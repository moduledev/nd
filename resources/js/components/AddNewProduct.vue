<script>
    import axios from 'axios';
    import _ from "lodash";

    export default {
        data() {
            return {
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
                isChecked: [],
                urls: [],
                max: 1,
                available: 1,
                gluten: 0,
                lactose: 0,

                attributeSelected: '',
                attributeValueRu: '',
                attributeValueUa: '',
                attributeValues: [],
                attributePrice: 0,
                attributeName: '',
                errors: [],
            }
        },
        mounted() {
            const catesgory = axios
                .get('/admin/categories')
                .then(responce => (this.categories = responce.data));
            const attr = axios
                .get('/admin/attributes')
                .then(responce => (this.attributes = responce.data))
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
                    };
                    reader.readAsDataURL(event.target.files[index]);
                });
                this.urls = arr;
                this.images = images;
            },
            deleteElement(index) {
                let urls = this.urls;
                let images = this.images;
                urls.splice(index, 1);
                images.splice(index, 1);
                this.urls = urls;
                this.images = images;
                if (this.isChecked[0] === index) this.isChecked = [];
            },
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
            },
            submitForm(){
                const formData = new FormData();
                formData.append('name_ru', this.name_ru);
                formData.append('name_ua', this.name_ua);
                formData.append('price', this.price);
                formData.append('description_ru', this.description_ru);
                formData.append('description_ua', this.description_ua);
                formData.append('composition_ru', this.composition_ru);
                formData.append('composition_ua', this.composition_ua);
                formData.append('productCategories', JSON.stringify(this.productCategories));
                formData.append('productAttributes', this.productAttributes);
                formData.append('productImages', this.images);
                formData.append('available', this.available);
                formData.append('gluten', this.gluten);
                formData.append('lactose', this.lactose);
                formData.append('mainImage', this.isChecked);
                let apps = {
                    productImages: this.productImages
                }
                axios({
                    method: 'post',
                    url:'/admin/product/store',
                    data:formData,
                    headers: {'Content-Type': 'multipart/form-data' }
                }).then(responce => {
                    console.log(response)
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
</style>


