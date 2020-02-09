
Vue.component('coupon', {
    template: '<input @blur="onCouponApplied()" type="text">',
    methods: {
        onCouponApplied(){
            this.$emit('applied');
        }
    },
});

new Vue({
    el: "#app",
    data(){
        return {
            isApplied: false
        }
    },
    methods: {
        onCouponApplied(){
            this.isApplied = true;
        }
    },
});