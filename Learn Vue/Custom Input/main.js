
Vue.component('coupon', {
    props: ['code'],
    template: '\
        <input type="text" :value="code" @input="update($event.target.value)" ref="input" />\
    ',
    methods: {
        update(val){
            if(val.includes('new2019')){
                alert("This coupon expired!");

                this.$refs.input.value = val =  "";
            }

            this.$emit('input', val);
        }
    },
});

new Vue({
    el: '#app',
    data(){
        return {
            code: "your coupon"
        }
    }
});