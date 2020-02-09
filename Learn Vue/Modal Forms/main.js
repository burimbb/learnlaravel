
Vue.component('modal', {
    template: '\
    <div class="modal is-active" v-show="isActive">\
      <div class="modal-background"></div>\
      <div class="modal-card">\
        <header class="modal-card-head">\
          <p class="modal-card-title"><slot name="title"></slot></p>\
          <button class="delete" aria-label="close" @click="isActive = false"></button>\
        </header>\
        <section class="modal-card-body">\
        <slot name="content"></slot>\
        </section>\
        <footer class="modal-card-foot">\
          <slot name="footer">\
            <button class="button is-success">Save changes</button>\
            <button class="button">Cancel</button>\
          </slot>\
        </footer>\
      </div>\
    </div>',

    data(){
      return {
        isActive: true,
      }
    },
});

new Vue({
    el: '#app'
});