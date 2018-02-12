export const state = {
  token: ''
}

export const mutations = {
  CSRF (state, csrf) {
    state.token = csrf
  }
}

export default {
  state,
  mutations
}
