import api from '@/common/api.js'

export default {
  namespaced: true,

  state: {
  },
  getters: {
  },
  actions: {
    async submitUpdated({ commit }, { data }) {
        try {
            const response = api.post('painel/video/submitUpdated', { ...data })

            return response
        } catch (error) {
            throw new Error(error)
        }
    },

    async submidCreated({ commit }, { data }) {
      try {
        const response = api.post('painel/video/submidCreated', { ...data })

        return response
      } catch (error) {
          throw new Error(error)
      }
    },

    async deletedVideo({ commit }, { data }) {
      try {
        const response = api.post('painel/video/deletedVideo', { ...data })

        return response
      } catch (error) {
          throw new Error(error)
      }
    }
  },
  mutations: {
  
  },
}
