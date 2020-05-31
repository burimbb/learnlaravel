<template>
    <div>
        <div class="container">
            <button class="btn btn-primary" @click="$modal.show('first-slideup')">Show modal</button>

            <slide-up-modal name="first-slideup">
                <template slot="heading">
                    Hello Title
                </template>
                <template slot="main">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem magni ratione quos, beatae dolor exercitationem saepe? Porro voluptatem facilis et iusto quos repellat ex molestiae quibusdam excepturi ipsum, necessitatibus quod?
                </template>
                <template slot="footer">
                    <button class="btn btn-success" @click="$modal.hide('first-slideup')">Update</button>
                </template>
            </slide-up-modal>
        </div>
    </div>
</template>
<script>
import SlideUpModal from './SlideUpModal';

export default {
    components: {SlideUpModal}
}
</script>