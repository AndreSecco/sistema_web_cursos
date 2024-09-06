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
            const response = api.post('painel/curso/submitUpdated', { ...data })

            return response
        } catch (error) {
            throw new Error(error)
        }
    },

    async submidCreated({ commit }, { data }) {
      try {
        const response = api.post('painel/curso/submidCreated', { ...data })

        return response
      } catch (error) {
          throw new Error(error)
      }
    },

    async deletedCurso({ commit }, { data }) {
      try {
        const response = api.post('painel/curso/deletedCurso', { ...data })

        return response
      } catch (error) {
          throw new Error(error)
      }
    }
  },
  mutations: {
  
  },
}
