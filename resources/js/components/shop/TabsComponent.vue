<template>
    <div class="product-tabs">
        <ul class="product-tabs__list">
            <li class="product-tabs__tab"
                v-for="(category,index) in categories"
                @click="changeTab(category.name)"
                :key="index"
                :class="{ 'product-tabs__tab-active': isActive(category.name) }"
            >
                {{category.name}}
            </li>
        </ul>
        <ProductCartPreview :categories="categories" :active="activeTab"></ProductCartPreview>
    </div>
</template>

<script>

    import ProductCartPreview from './Product-card-preview'

    export default {
        name: "TabsComponent",
        props: ['categories'],
        components: {
            ProductCartPreview
        },
        data() {
            return {
                //assign first entity of categories to tab
                activeTab: Object.values({...this.categories[0].name}).join(''),
            }
        },
        methods: {
            isActive(menuItem) {
                return this.activeTab === menuItem
            },
            changeTab(menuItem) {
                this.activeTab = menuItem;
            }
        }
    }
</script>

<style scoped>

</style>
