<template>
  <div class="ui comments">
    <div class="ui inverted active dimmer" v-if="loading">
      <div class="ui text loader">Récupération des commentaires...</div>
    </div>
    <comment :comment="comment" :ip="ip" v-for='(comment, index) in comments' :key="index" :transition="transition"></comment>
    <comment-form :id="id" :model="model" v-if="reply == 0"></comment-form>
  </div>
</template>

<script type="text/babel">
import Comment from './comments/Comment.vue'
import CommentForm from './comments/Form.vue'
import { comments, reply } from '../store/getters'
import { getComments, setCSRFToken } from '../store/actions'

export default {
  data () {
    return {
      loading: false,
      transition: false
    }
  },
  vuex: {
    getters: { comments, reply },
    actions: { getComments, setCSRFToken }
  },
  components: { Comment, CommentForm },
  props: {
    id: Number,
    model: String,
    csrf: String,
    ip: String
  },
  mounted: function () {
    this.setCSRFToken(this.csrf)
    let onScroll = () => {
      if (this.$el.getBoundingClientRect().top - window.innerHeight <= 0) {
        this.loading = true
        this.getComments(this.model, this.id).then(() => {
          this.loading = false
          this.$nextTick(() => {
            this.transition = 'fade-from-right'
          })
        })
        window.removeEventListener('scroll', onScroll)
      }
    }
    window.addEventListener('scroll', onScroll)
  }
}
</script>
