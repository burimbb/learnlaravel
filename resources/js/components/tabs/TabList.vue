<template>
    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li v-for="(tab, index) in tabs" :key="index" class="nav-item">
                <a :href="tab.href" :class="['nav-link', {'active': tab.selected}]" @click="selectTab(tab)" :id="tab.name" data-toggle="tab" role="tab" aria-selected="false">{{tab.name}}</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            tabs: [],
        };
    },

    methods:{
        selectTab(selectedTab){
            this.tabs.forEach(tab => {
                tab.isActive = (tab.name == selectedTab.name);
            });
        }
    },

    created(){
        this.tabs = this.$children;
    }
}
</script>