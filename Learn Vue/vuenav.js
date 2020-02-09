Vue.component('tabs', {
    template: '<div><div class="tabs"><ul><li v-for="tab in tabs" :class="{\'is-active\': tab.isActive}" @click="changeTab(tab)"><a :href="tab.href">{{tab.name}}</a></li></ul></div><div class="tabs-details"><slot></slot></div></div>',
    created() {
        this.tabs = this.$children;
    },
    methods: {
        changeTab(tabSelected){
            this.tabs.forEach(tab => {
                tab.isActive = tabSelected == tab;
            });
        }
    },
    data() {
        return {
            tabs: []
        }
    }
});

Vue.component('tab', {
    props: {
        name: {
            required: true,
        },
        selected: {
            default: false,
        }
    },
    computed: {
        href(){
            return '#'+ this.name.toLowerCase().replace(/ /g, '-');
        }
    },
    data(){
        return{
            isActive: this.selected,
        }
    },
    template: '<div v-show="isActive"><slot></slot></div>',
});

new Vue({
    el: '#root'
});