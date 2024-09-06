<template>
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div id="banner01" class="bannerModulos">
          <div class="container px-4 px-lg-5 h-100">
            <div
              class="row gx-4 gx-lg-5 h-100 align-items-left justify-content-left text-left ml-4 container-escrita-banner"
            >
              <div class="col-lg-8 align-self-end text-left">
                <!-- <h6 class="titulo-superior">INICIE HOJE MESMO</h6> -->
                <h5 class="title-principal text-white font-weight-bold">
                  Módulos do curso: {{ titulo_curso }}
                </h5>
                <!-- <hr /> -->
              </div>
              <social-icons></social-icons>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      titulo_curso: ''
    }
  },

  created() {
    this.$store.dispatch('modulos/getCursosFromModule', { nr_seq_curso: this.$route.params.id }).then(response => {
      this.titulo_curso = response.data.curso.titulo_curso
    })
  }
}
</script>

<style lang="scss" src="./style.scss" scoped />
