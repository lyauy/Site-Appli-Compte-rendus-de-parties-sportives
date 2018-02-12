<template>
  <div>
    <h3 class="ui header dividing">{{ reply == 0 ? 'Commenter' : 'Répondre' }}</h3>
    <form action="" class="ui form" @submit.prevent="sendComment">
      <div class="ui inverted active dimmer" v-if="loading">
        <div class="ui text loader">Récupération des commentaires...</div>
      </div>
      <div class="two fields">
        <div class="field">
          <label>Pseudo</label>
          <input type="text" v-model="username">
        </div>
        <div class="field">
          <label>Email</label>
          <input type="text" v-model="email">
        </div>
      </div>
      <div class="field">
        <label>Votre commentaire</label>
        <textarea v-model="content" cols="30" rows="10"></textarea>
      </div>
      <button class="ui blue labeled submit icon button">
        <i class ="icon edit"></i>
        {{ reply == 0 ? 'Commenter' : 'Répondre'}}
      </button>
    </form>
  </div>
</template>

<script type="text/babel">
import axios from 'axios'

export const addComment = function (store, comment) {
  comment._token = store.state.csrf.token
  return axios.post('/comments', comment).then((response) => {
    store.dispatch('ADD_COMMENT', response.data)
  })
}

export default {
  vuex: {
    actions: { addComment }
  },
  data () {
    return {
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
      this.loading = true
      this.addComment({
        commentable_id: this.id,
        commentable_type: this.model,
        content: this.content,
        username: this.username,
        email: this.email,
        reply: this.reply
      }).catch((response) => {
        console.log('ERRRRRRRRRRRORS', response.data)
      }).then(() => {
        this.loading = false
      })
    }
  }
}

</script>
