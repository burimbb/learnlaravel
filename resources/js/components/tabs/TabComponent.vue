<template>
    <div :class="['tab-pane fade show pt-3 active']" id="home" role="tabpanel" aria-labelledby="home-tab" v-show="isActive">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        'name': { required: true },
        'selected': {default: false }
    },

    data(){
        return {
            isActive: this.selected
        };
    },

    computed:{
        href(){
            return '#'+this.name.toLowerCase().replace(/ /g, '-');
        }
    },
}
</script>