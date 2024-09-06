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
            const response = api.post('painel/modulo/submitUpdated', { ...data })

            return response
        } catch (error) {
            throw new Error(error)
        }
    },

    async submidCreated({ commit }, { data }) {
      try {
        const response = api.post('painel/modulo/submidCreated', { ...data })

        return response
      } catch (error) {
          throw new Error(error)
      }
    },

    async deletedModulo({ commit }, { data }) {
      try {
        const response = api.post('painel/modulo/deletedModulo', { ...data })

        return response
      } catch (error) {
          throw new Error(error)
      }
    }
  },
  mutations: {
  
  },
}
