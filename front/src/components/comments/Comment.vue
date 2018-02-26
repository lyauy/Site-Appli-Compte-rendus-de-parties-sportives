<template>
  <div class="comment" style="position:relative;">
    <span class="ui inverted active dimmer" v-if="loading">
        <div class="ui text loader"></div>
    </span>
    <div class="avatar"><img :src="'https://img.etsystatic.com/il/5e3fc7/1258695533/il_570xN.1258695533_9o6p.jpg' + comment.email_md5" alt=""></div>
    <div class="content">
      <span class="author" >{{ comment.username }}</span>
      <div class="metadata">
        <span class="date">{{ comment.created_at }}</span>
        <span style="color: #ff0000" @click="deleteComment" v-if="can_delete"></span>
      </div>
      <div class="text">
        {{ comment.content }}
      </div>
      <div class="actions">
        <a href="#" @click.prevent="replyTo(reply_to)">Répondre</a>
      </div>
    </div>
    <div class="comment">
      <comment :comment="reply" v-for="(reply, index) in comment.replies" :ip="ip" :key="index" transition="fade-from-right"></comment>
      <comment-form :id="comment.commentable_id" :model="comment.commentable_type" :reply="comment.id" v-if="form_visible"></comment-form>
    </div>
  </div>
</template>

<script type="text/babel">
import axios from 'axios'
import CommentForm from './Form.vue'

export const reply = (state) => state.reply

export const replyTo = function (store, id) {
  store.dispatch('REPLY_TO', id)
}

export const deleteComment = function (store, comment) {
  return axios.delete('/comments/' + comment.id, {params: {_token: store.state.csrf}}).then((response) => {
    store.dispatch('DELETE_COMMENT', response.data)
  })
}

export default {
  name: 'comment',
  vuex: {
    actions: { replyTo, deleteComment },
    getters: { reply }
  },
  methods: {
    deleteCommentAction: function () {
      this.loading = true
      this.deleteComment(this.comment).catch((response) => {
        window.alert(response.data)
      }).then(() => {
        this.loading = false
      })
    }
  },
  data () {
    return {
      loading: false
    }
  },
  components: { CommentForm },
  computed: {
    form_visible: function () {
      return this.reply === this.comment.id
    },
    reply_to: function () {
      return this.comment.reply === 0 ? this.comment.id : this.comment.reply
    },
    can_delete: function () {
      return this.ip === this.comment.ip_md5
    }
  },
  props: {
    ip: String,
    comment: Object
  }
}
</script>
