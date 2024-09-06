<template>
  <div class="col-12" id="cursos">
    <div class="col-12 row section-cursos">
      <div class="col-12">
        <h6 class="titulo-superior ">CURSOS INICIAIS</h6>
        <h1 class="text-left title-cursos mt-2 mb-4">Cursos <span class="palavras-coloridas">exclusivos</span> para você,<br>
            assista quando e onde <span class="palavras-coloridas">quiser</span>!</h1>
      </div>
      <hr />
      <div class="todos-cursos-free row mt-5">
        <div class="col-4" v-for="curso in getAllCursos" :key="curso.nr_sequecial">
          <div class="cardCursos cardGtrans">
                <p class="title" :style="backgroundTitulo(curso.cor_titulo_curso)">{{ curso.titulo_curso }}</p>
                <h6 class="subtitle">{{ curso.subtitulo_curso }}</h6>
                <span class="text">
                    {{ curso.ds_curso }}
                </span>
                <router-link :to="'/modulos/' + curso.nr_sequencial"  class="btn btn-outline-secondary btn-cursos"><i class="bi bi-layers"></i> Veja Mais</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {

  computed: {
    getAllCursos() {
      const allCursos = this.$store.getters['cursos/allCursos']

      return allCursos
    }
  },

  methods: {
    backgroundTitulo(cor){
      return `background-color: ${cor}`
    }
  },

  created() {
    this.$store.dispatch('cursos/getAllCursos')
  },

};
</script>
<style lang="scss" src="./style.scss" scoped />
