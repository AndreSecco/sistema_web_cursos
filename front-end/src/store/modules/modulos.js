import api from '@/common/api.js'

export default {
  namespaced: true,

  state: {
    allModulos: null,
    curso: ''
  },
  getters: {
    allModulos: (state) => state.allModulos,
    curso: (state) => state.curso
  },
  actions: {
    async getModulos({ commit }, { nr_seq_curso }) {
        try {
            const response = api.get(`modulos/getModulos/${nr_seq_curso}`).then(response => {

              commit('setAllModulos', response.data)
              return response
            })       
        } catch (error) {
            throw new Error(error)
        }
    },

    async getCursosFromModule({ commit }, { nr_seq_curso }){
      try {
        const response = api.get(`modulos/getCursosFromModule/${nr_seq_curso}`)
        
        commit('setCursoFromModulo', response.data)
        return response            
      } catch (error) {
          throw new Error(error)
      }
    },

    async getModulo({ commit }, { nr_seq_modulo }){
      try {
        const response = api.get(`modulos/getModulo/${nr_seq_modulo}`)
        
        return response            
      } catch (error) {
          throw new Error(error)
      }
    }
  },
  mutations: {
    setAllModulos(state, modulo){
      state.allModulos = modulo
    },

    setCursoFromModulo(state, curso){
      state.curso = curso
    }
  },
}
