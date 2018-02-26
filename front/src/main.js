import Vue from 'vue'
import Comments from './components/Comments.vue'
import store from './store/store'

require('./css/animations.css')

global.store = store
/* eslint-disable no-new */
new Vue({

  el: '#app',
  store,
  components: { Comments }

})
