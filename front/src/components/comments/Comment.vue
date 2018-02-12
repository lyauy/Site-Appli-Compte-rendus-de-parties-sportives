<template>
  <div class="comment">
    <div class="avatar"><img :src="'https://img.etsystatic.com/il/5e3fc7/1258695533/il_570xN.1258695533_9o6p.jpg' + comment.email_md5" alt=""></div>
    <div class="content">
      <span class="author">{{ comment.username }}</span>
      <div class="metadata">
        <span class="date">{{ comment.created_at }}</span>
      </div>
      <div class="text">
        {{ comment.content }}
      </div>
      <div class="actions">
        <a href="#">Répondre</a>
      </div>
    </div>
    <div class="comment">
      <comment :comment="reply" v-for="(reply, index) in comment.replies" :ip="ip" :key="index"></comment>
      <!--<comment-form :id="comment.commentable_id" :model="comment.commentable_type" :reply="comment.id" v-if="comment.reply == 0"></comment-form>-->
    </div>
  </div>
</template>

<script type="text/babel">
import CommentForm from './Form.vue'

export default {
  name: 'comment',
  components: { CommentForm },
  props: {
    ip: String,
    comment: Object
  }
}
</script>
