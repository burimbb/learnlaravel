<template>
    <div>
        <div class="row">
            <p>Another Vuex Component</p>
            <br>
            <p v-text="test"></p>
        </div>
        <div class="row">
            <p>Store</p>
            <br>
            <p v-text="globalcounter"></p>
            <br>
            <p>Sqrt of count: {{sqrt}}</p>
        </div>
    </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';

export default {
    data(){
        return {
            test: '100.000.000',
        }
    },
    
    computed: {
        ...mapState({
            globalcounter: 'count'
        }),

        ...mapGetters(['sqrt']),
    },
 
    methods:{
    }
}
</script>