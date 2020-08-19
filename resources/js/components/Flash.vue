<template>
    <div class="alert alert-success spacing" role="alert" v-show="show">
        {{ body }}
    </div>
</template>

<script>
export default {
    props: ['message'],
    data() {
        return {
            show : false,
            body : '',
            status:''
        }
    },
    created() {
        if(this.message) {
            this.flash(this.message)
        }
        window.events.$on('flash',(message,status1) => this.flash(message, status1))
    },
    methods: {
        flash(message) {
            this.show = true
            this.body = message
            this.status = status1

            setTimeout(() => {
                this.hide()
            },3000)
        },
        hide() {
            this.show = false
        }
    }
}
</script>

<style>
.spacing {
    position: fixed;
    z-index: 99999;
    right: 25px;
    top: 25px;
}
</style>
