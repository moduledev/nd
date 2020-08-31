<script>
import {eventBus} from '../../../eventBus'

export default {
    name: "Auth-tabs",
    methods: {
        emitClickEvent(tab) {
            eventBus.$emit('active', tab)
        }
    }
}
</script>

<style scoped>

</style>
