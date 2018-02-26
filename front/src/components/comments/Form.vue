<template>
  <div>
    <h3 class="ui header dividing">{{ reply == 0 ? 'Commenter' : 'Répondre' }}</h3>
    <form action="" class="ui form" @submit.prevent="sendComment" style="position:relative;">
      <div class="ui inverted active dimmer" v-if="loading">
        <div class="ui text loader">Récupération des commentaires...</div>
      </div>
      <div class="two fields">
        <div class="field" v-bind:class="{error: errors.username}">
          <label>Pseudo</label>
          <input type="text" v-model="username">
        </div>
        <div class="field" v-bind:class="{error: errors.email}">
          <label>Email</label>
          <input type="text" v-model="email">
          <span class="danger" v-if="errors.email">{{ errors.email.join(', ') }}</span>
        </div>
      </div>
      <div class="field" v-bind:class="{error: errors.content}">
        <label>Votre commentaire</label>
        <textarea v-model="content" cols="30" rows="10"></textarea>
      </div>
      <button class="ui blue labeled submit icon button">
        <i class ="icon edit"></i>
        {{ reply == 0 ? 'Commenter' : 'Répondre'}}
      </button>
      <button class="ui grey labeled submit icon button" @click.prevent="replyTo(0)" type="button" v-if="reply > 0">
        <i class ="icon cancel"></i>
        Annuler
      </button>
    </form>
  </div>
</template>

<script type="text/babel">
import axios from 'axios'

export const addComment = function (store, comment) {
  comment._token = store.state.csrf
  return axios.post('/comments', comment).then((response) => {
    store.dispatch('ADD_COMMENT', response.data)
  })
}

export const replyTo = function (store, id) {
  store.dispatch('REPLY_TO', id)
}

export default {
  vuex: {
    actions: { addComment, replyTo }
  },
  data () {
    return {
      errors: {},
      username: '',
      email: '',
      content: '',
      loading: false
    }
  },
  props: {
    id: Number,
    model: String,
    reply: {
      type: Number,
      default: 0
    }
  },
  methods: {
    sendComment: function () {
      this.errors = {}
      this.loading = true
      this.addComment({
        commentable_id: this.id,
        commentable_type: this.model,
        content: this.content,
        username: this.username,
        email: this.email,
        reply: this.reply
      }).catch(error => {
        this.errors = error.response.data
        console.log(this.errors)
      }).then(() => {
        this.loading = false
        if (Object.keys(this.errors).length === 0) {
          this.username = ''
          this.content = ''
          this.email = ''
          this.replyTo(0)
        }
      })
    }
  }
}

</script>
