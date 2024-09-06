import api from '@/common/api.js'

export default {
  namespaced: true,

  state: {
    allCursos: null
  },
  getters: {
    allCursos: (state) => state.allCursos
  },
  actions: {
    async getAllCursos({ commit }) {
        try {
            const response = api.get('cursos/getAllCursos').then(response => {

              commit('setAllCursos', response.data)
              return response
            })       

        } catch (error) {
            throw new Error(error)
        }
    }
  },
  mutations: {
    setAllCursos(state, cursos){
      state.allCursos = cursos
    }
  },
}
