<template>
    <div class="mb-4 d-flex">
        <div class="mr-3">
            <div @click="isOpen = !isOpen">
                <i class="fa fa-plus-square-o text-2xl" aria-hidden="true" v-if="!isOpen"></i>
                <i class="fa fa-times-circle text-2xl" aria-hidden="true" v-else></i>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-2 text-black cursor-pointer" v-text="this.question.question" @click="isOpen = !isOpen"></h2>

            <p v-html="this.question.answer" v-show="isOpen"></p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['question'],

    data(){
        return {
            isOpen: false,
        }
    }
}
</script>