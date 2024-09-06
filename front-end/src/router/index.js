import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/Home/HomeView.vue'
import Modulos from '../views/Modulos/Modulos.vue'
import Video from  '../views/Video/Video.vue'
import CursosPainelView from '../views/Painel/Cursos/CursosPainelView.vue'
import ModulosPainelView from '../views/Painel/Modulos/ModulosPainelView.vue'
import VideosPainelView from '../views/Painel/Videos/VideosPainelView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/modulos/:id/',
    name: 'modulos',
    component: Modulos
  },
  {
    path: '/video/:id/:nrVideo',
    name: 'videoId',
    component: Video
  },
  {
    path: '/video/:id',
    name: 'video',
    component: Video
  },
  {
    path: '/painel/cursos',
    name: 'painel-cursos',
    component: CursosPainelView
  },
  {
    path: '/painel/modulos/:id',
    name: 'painel-modulos',
    component: ModulosPainelView
  },
  {
    path: '/painel/video/:id',
    name: 'painel-video',
    component: VideosPainelView
  },
  {
    path: '/painel/video/:id/:nrVideo',
    name: 'painel-video-id',
    component: VideosPainelView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
