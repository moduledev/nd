<template>
    <div class="product-tabs__tab-content">
        <div class="product-tabs__tab-pane" v-for="(category,index) in categories"
             :class="active === category.name ? 'show' : 'hide'"
        >
            <div class="product-card" v-for="product in category.products">
                <div class="product-card__image">
                    <img :src="'/storage/'+product.images[0]">
                </div>
                <div class="product-card__info">
                    <h5 class="product-card__title">{{product.name}}</h5>
                    <h6 class="product-card__price">${{product.price}}</h6>
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                        <div class="product-card__btn">Купити</div>
                        <div class="product-card__zoom"><i class="icon-search"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Product-card-preview",
        props: ['categories', 'active'],
    }
</script>

<style scoped>
    .show {
        display: flex
    }
    .hide {
        display: none;
    }


</style>
