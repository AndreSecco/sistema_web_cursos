<template>
    <div class="col-12" id="novidades">
      <div class="col-12 row section-novidades">
        <div class="col-12">
          <h6 class="titulo-superior ">NOVIDADES</h6>
          <h1 class="text-left title-novidades mt-2 mb-4">Estamos com <span class="palavras-coloridas">novidades</span>!<br>
              veja nossos últimos vídeos <span class="palavras-coloridas">lançados</span></h1>
        </div>
        <hr />
        <div class="todos-novidades-free row mt-5">
            <!-- <div class="col-6"> -->
                <div class="col-6 cardNovidadesIndividual" v-for="novidade in getNovidadeVideos" :key="novidade.nr_sequencial">
                    <div class="col-12">
                        <p class="title-card-novidades">{{ novidade.titulo_video }}</p>
                    </div>
                    <div class="row footer-card-novidades">
                        <div class="col-10">                            
                            <p class="text-novidades">{{ novidade.ds_video.substring(0, 90) + '...' }}</p>
                        </div>
                        <div class="col-2">
                            <router-link :to="'/video/' + novidade.nr_seq_modulo + '/' + novidade.nr_sequencial" class="btn btn-play-novidade">
                                <i class="bi bi-play-circle-fill h1"></i>
                            </router-link>
                        </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </template>
  <script>
export default {
    created() {
        this.$store.dispatch('videos/getNovidades')
    },

    computed: {
        getNovidadeVideos() {
            const novidades = this.$store.getters['videos/novidades']

            return novidades
        }
    }
};
</script>
  <style lang="scss" src="./style.scss" scoped />
  