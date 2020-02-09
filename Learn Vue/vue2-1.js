Vue.component('card', {
    props: ['title', 'content'],

    template: '<div class="card"><header class="card-header"><p class="card-header-title">{{this.title}}</p><a href="#" class="card-header-icon" aria-label="more options"><span class="icon"><i class="fas fa-angle-down" aria-hidden="true"></i></span></a></header><div class="card-content"><div class="content">{{this.content}}</div></div></div>'
});

Vue.component('modal', {
    template: '<div class="modal is-active is-clipped"><div class="modal-background"></div><div class="modal-content box"><slot></slot></div><button class="modal-close is-large" aria-label="close" @click="$emit(\'closed\')"></button></div>'
    
});

new Vue({
    el: "#root",
    data: {
        showModal: false
    },
});