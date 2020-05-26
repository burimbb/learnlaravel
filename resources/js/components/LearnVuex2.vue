<template>
    <div class="col-md-6">
        <div class="card card-title">
            Component 1
        </div>

        <p>Local Count: {{myCount}}</p>
        <p>Global Count: {{aliasCount}}</p>

        <button class="btn btn-secondary" @click="increment">Increase</button>
        <button class="btn btn-danger" @click="decrement">Decrease</button>
    </div>
</template>

<script>
import {mapState, mapMutations} from 'vuex';

export default {
    data(){
        return {
            myCount: 10,
        }
    },

    computed:{
        ...mapState({
            aliasCount: 'count'
        }),
    },

    methods:{
        ...mapMutations(['increment', 'decrement']),
    },
}
</script>