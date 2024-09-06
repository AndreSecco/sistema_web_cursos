import api from '@/common/api.js'

export default {
  namespaced: true,

  state: {
    allVideoFromModule: '',
    singleVideo: '',
    novidades: ''
  },
  getters: {
    allVideoFromModule: (state) => state.allVideoFromModule,
    singleVideo: (state) => state.singleVideo,
    novidades: (state) => state.novidades
  },
  actions: {
    async getAllVideosFromModule({ commit }, { nr_seq_modulo, nr_sequencial }) {
      try {
        const response = api.get(`videos/getAllVideosFromModule/${nr_seq_modulo}`).then(response => {

          history.pushState({}, null, response.data[0].nr_sequencial)
          // console.log(response.data[0])
          commit('setSingleVideo', response.data[0])
          commit('setAllVideo', response.data)
          return response
        })

      } catch (error) {
        throw new Error(error)
      }
    },

    async getSingleVideo({ commit }, { nr_seq_video }) {
      try {
        const response = api.get(`videos/getSingleVideo/${nr_seq_video}`).then(response => {

          history.pushState({}, null, response.data[0].nr_sequencial)
          console.log(response.data[0])
          commit('setSingleVideo', response.data[0])
          return response
        })

      } catch (error) {
        throw new Error(error)
      }
    },

    async getNovidades({ commit }) {
      try {
        const response = api.get(`videos/getNovidades`).then(response => {

          console.log(response)
          commit('setNovidades', response.data)
          return response
        })

      } catch (error) {
        throw new Error(error)
      }
    }
  },
  mutations: {
    setAllVideo(state, video) {
      state.allVideoFromModule = video
    },

    setSingleVideo(state, singleVideo) {
      state.singleVideo = singleVideo
    },

    setNovidades(state, novidades) {
      state.novidades = novidades
    }
  },
}
