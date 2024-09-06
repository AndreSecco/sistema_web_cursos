<template>
  <div>
    <div class="menu-video">
      <ul>
        <li :class="classBtnActive(menu.titulo_video)" v-for="menu in allMenuVideos" :key="menu.nr_sequencial">
          <button
            @click="getVideoSelected(menu.nr_sequencial, menu.nr_seq_modulo)"
            class=" router-menu-video btn"
          >
            {{ menu.titulo_video }}
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return {
            classAtivo: ''
        }
    },
    computed: {
        allMenuVideos() {
            const menus = this.$store.getters['videos/allVideoFromModule']

            return menus
        },

        getInformationVideo() {
            const video = this.$store.getters['videos/singleVideo']

            return video
        },

        getTituloVideo(){
            const titulo = this.getInformationVideo

            return titulo.titulo_video
        },

    },  

    methods: {
        classBtnActive(titulo) {
            if(titulo == this.getTituloVideo){
                return 'active'
            }

            return 'router-menu-video btn'
        },

        getVideoSelected(nr_seq_video){
            this.$store.dispatch('videos/getSingleVideo', { nr_seq_video: nr_seq_video })
        }
    },

    created() {
        const menuActive = this.allMenuVideos
            
            var validador = ''
            menuActive.forEach(menu => {
                if(menu.titulo_video === this.getTituloVideo){
                    this.classAtivo = 'active'
                }
            });
    }
}
</script>

<style lang="scss" src="./style.scss" scoped />
