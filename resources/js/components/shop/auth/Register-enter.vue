<script>
import {eventBus} from "../../../eventBus";

export default {
    name: "Register-enter",
    data() {
        return {
            registerTab: false,
            enterTab: false,
            modalShow: false
        }
    },
    methods: {
        closeModal() {
            this.modalShow = false;
            window.document.getElementById('shadow').classList.add("d-none");
        }
    },
    created() {
        eventBus.$on('active', tab => {
            window.document.getElementById('shadow').classList.remove("d-none");
            if (tab === 'enter') {
                this.enterTab = true;
                this.registerTab = false;
                this.modalShow = true;
            } else if (tab === 'register') {
                this.enterTab = false;
                this.registerTab = true;
                this.modalShow = true;
            }
        })
        eventBus.$off('active', tab);
    }
}
</script>

<style scoped>
.show {
    display: block !important;
}
</style>
