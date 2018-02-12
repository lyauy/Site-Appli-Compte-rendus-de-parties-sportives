<template>
  <div class="ui comments">
    <div class="ui inverted active dimmer" v-if="loading">
      <div class="ui text loader">Récupération des commentaires...</div>
    </div>
    <comment :comment="comment" :ip="ip" v-for='(comment, index) in comments' :key="index"></comment>
    <comment-form :id="id" :model="model"></comment-form>
  </div>
</template>

<script type="text/babel">
import Comment from './comments/Comment.vue'
import CommentForm from './comments/Form.vue'
import { comments } from '../store/getters'
import { getComments, setCSRFToken } from '../store/actions'

export default {
  data () {
    return {
      loading: true
    }
  },
  vuex: {
    getters: { comments },
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
    this.$nextTick(function () {
      this.getComments(this.model, this.id).then(() => {
        this.loading = false
      })
    })
  }
}
</script>
