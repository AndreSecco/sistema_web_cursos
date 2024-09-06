<template>
  <div>
    <div class="div-title-video">
      <router-link class="active router-menu-video btn mb-3" :to="'/modulos/' + id_curso"><i class="bi bi-chevron-double-left"></i> Voltar</router-link>
      <h2 class="title">{{ getTituloVideo }}</h2>
      <h6 class="breadcrumb">{{ nomeCurso }} -> {{ titulo_modulo }}</h6>
    </div>
    <div class="video">
      <iframe
        class="single-video"
        width="820"
        height="515"
        :src='getLinkVideo'
      >
      </iframe>

      <div class="description-video">
            <p>{{ getDescVideo }}</p>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return {
        titulo: '',
        nomeCurso: '',
        titulo_modulo: '',
        id_curso: ''
      }
    },

    created() {
      this.$store.dispatch('modulos/getModulo', { nr_seq_modulo: this.$route.params.id }).then(response => {
        this.titulo_modulo = response.data[0].titulo_modulo
          this.$store.dispatch('modulos/getCursosFromModule', { nr_seq_curso: response.data[0].nr_seq_curso }).then(response => {
            this.nomeCurso = response.data.curso.titulo_curso
            this.id_curso = response.data.curso.nr_sequencial
          })
      })
    },

    computed: {
      getInformationVideo() {
        const video = this.$store.getters['videos/singleVideo']

        return video
      },

      getTituloVideo(){
        const titulo = this.getInformationVideo

        return titulo.titulo_video
      },

      getLinkVideo(){
        const link = this.getInformationVideo

        return link.link_video
      },

      getDescVideo(){
        const desc = this.getInformationVideo

      return desc.ds_video
      },

    },


    methods: {
      setTitulo(titulo){
        this.titulo = titulo
      }
    },  
  };
</script>
  <style lang="scss" src="./style.scss" scoped />
  