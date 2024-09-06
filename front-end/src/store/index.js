import Vue from 'vue'
import Vuex from 'vuex'
import cursos from './modules/cursos'
import modulos from './modules/modulos'
import videos from './modules/videos'
import Painelcurso from './modules/Painelcurso'
import Painelmodulos from './modules/Painelmodulos'
import Painelvideos from './modules/Painelvideos'


// Vue.component(VueEasyLightbox.name, VueEasyLightbox)
// Vue.use(VueEasyLightbox)
// Vue.use(Vuex)
// Vue.use(ModalPlugin)

Vue.use(Vuex)

export default new Vuex.Store({

  modules: {
    cursos,
    modulos,
    videos,
    Painelcurso,
    Painelmodulos,
    Painelvideos
  },
  
})
