import axios from 'axios'

export const getComments = function (store, model, id) {
  return axios.get('/comments', {params: {id: id, type: model}}).then((response) => {
    store.dispatch('ADD_COMMENTS', response.data)
  })
}

export const addComment = function (store, comment) {
  comment._token = store.state.csrf.token
  return axios.post('/comments', comment).then((response) => {
    store.dispatch('ADD_COMMENT', response.data)
  })
}

export const setCSRFToken = function (store, token) {
  store.dispatch('CSRF_TOKEN', token)
}
