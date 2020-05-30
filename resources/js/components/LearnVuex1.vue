<template>
    <div class="col-md-6">
        <div class="card card-title">
            Component 1
        </div>

        <p>Local Count: {{myCount}}</p>
        <p>Global Count: {{count}}</p>

        <button class="btn btn-secondary" @click="increment">Increase</button>
        <button class="btn btn-secondary" @click="incrementAction">Increase With Action</button>
        <button class="btn btn-danger" @click="decrement">Decrease</button>
    </div>
</template>

<script>
import {mapState, mapMutations, mapActions} from 'vuex';

export default {
    data(){
        return {
            myCount: 10,
        }
    },

    computed:{
        ...mapState(['count']),
    },

    methods:{
        ...mapMutations(['increment', 'decrement']),
        ...mapActions({
            incrementAction: 'increment'
        }),
    },
}
</script>