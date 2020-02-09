Vue.component('test', {
    template: "<div><h3>Test Component</h3></div>"
});

Vue.component('progress-view', {
    data() {
        return {
            rates: 2
        }
    },
});

new Vue({
    el: '#app'
});