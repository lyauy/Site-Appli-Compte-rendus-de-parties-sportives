import Vue from 'vue'
import Comments from './components/Comments.vue'
import store from './store/store'
import ago from './filters/ago'
import scrollTo from 'scroll-to'

require('./css/animations.css')

Vue.filter('ago', ago)
Vue.component('scroll', {
  template: '<transition name="scroll" v-on:after-enter="afterEnter"></transition>',
  methods: {
    afterEnter: function (el) {
      let rect = el.getBoundingClientReact()
      let top = rect.top + (window.pageYOffset || document.document.scrollTop)
      let center = ((window.innerHeight || window.clientHeight) - rect.height) / 2
      scrollTo(0, top - center, {duration: 500})
    }
  }
})

global.store = store
/* eslint-disable no-new */
new Vue({

  el: '#showcr',
  store,
  components: { Comments }

})
