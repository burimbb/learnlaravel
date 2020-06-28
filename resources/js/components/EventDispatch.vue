<template>
    <div>
        <p>Hello from events: Press Enter</p>
        <input type="text" v-model="data" @keyup.enter="entered()">
    </div>
</template>
<script>
export default {
    data(){
        return {
            data: ''
        }
    },

    methods: {
        entered(){
            /* Event.$emit('input-submited', this.data); */
            Event.fire('input-submited', this.data);
        }
    },

    created(){
        /* Event.$on('input-submited', (text) => { alert("Input has been submited! "+text); }); */
        Event.listen('input-submited', (text) => { alert("Input has been submited! "+text); });
    }
}
</script>