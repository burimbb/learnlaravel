<template>
    <modal
        :name="name"
        height="auto"
        width="100%"
        transition="slideUp"
        :pivotY="1"
    >
        <section class="container my-5">
            <slot name="heading-wrap">
                <div class="d-flex justify-content-between mb-3">
                    <slot name="heading"></slot>
                    
                    <button type="button" class="close" aria-label="Close" @click="hide()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </slot>

            <slot name="main-wrap">
                <div class="mb-3">
                    <slot name="main"></slot>
                </div>
            </slot>

            <slot name="footer-wrap">
                <slot class="d-flex justify-content-between" name="footer">
                    <button class="btn btn-primary" @click="$emit('ok')">OK</button>
                    <button class="btn btn-danger" @click="hide()">Cancel</button>
                </slot>
            </slot>
        </section>
    </modal>
</template>
<script>
export default {
    props: [
        'name'
    ],

    methods: {
        show () {
            this.$modal.show(this.name);
        },
        hide () {
            this.$modal.hide(this.name);
        }
    }
}
</script>