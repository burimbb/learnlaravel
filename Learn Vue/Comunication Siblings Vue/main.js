
window.Event = new Vue({});

window.Events = new class {
    
    constructor(){
        this.vue = new Vue();
    }

    fire(event, data = null){
        this.vue.$emit(event, data);
    }
    
    listen(event, callback){
        this.vue.$on(event, callback);
    }
}

Vue.component('coupon', {
    template: '<input @blur="onCouponApplied()" type="text">',
    methods: {
        onCouponApplied(){
            /* Event.$emit('notifyother'); */
            Events.fire('notifyother');
        }
    },
});

Vue.component('another-coupon', {
    template: '<p>Another Coupon</p>',
    created() {
        Events.listen('notifyother', () => {
            alert("This was notified from other component!!");
        });
        
        /* Event.$on('notifyother', () => {
            alert("This was notified from other component!!");
        }); */
    },
});

new Vue({
    el: '#root'
});