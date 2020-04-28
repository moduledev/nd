<template>
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
        <button class="btn btn-info" @click="sendImages">Добавить фото</button>

    </div>
</template>

<script>

    export default {
        name: "ImageProductUpload",
        data() {
            return {
                images: [],
                urls: [],
                isChecked: [],
                max: 1
            }
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
            deleteElement(index){
                let urls = this.urls;
                let images =  this.images;
                urls.splice(index,1);
                images.splice(index,1);
                this.urls = urls;
                this.images = images;
                if(this.isChecked[0] === index ) this.isChecked = [];
            },
            sendImages(){
                this.$emit('getimages', {
                    images: this.images,
                    isChecked: this.isChecked
                } )
            }
        }
    }
</script>

