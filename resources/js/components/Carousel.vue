<template>
    <div>
        <slot></slot>
    </div>
</template>

<script>
import Flickity from 'flickity';
import 'flickity/dist/flickity.min.css';

export default {
    props: ['autoplay', 'wraparound'],
    mounted(){
        new Flickity(this.$el, {
            cellAlign: 'left',
            contain: 'true',
            wrapAround: this.wraparound,
            autoPlay: this.autoplay
        });
    }
}
</script>