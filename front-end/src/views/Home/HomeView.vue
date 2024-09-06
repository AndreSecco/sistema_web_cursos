<template>
  <div class="home">
    <banner-home></banner-home>

    <!-- <categorias></categorias> -->

    <sobre></sobre>

    <cursos></cursos>

    <novidades></novidades>

    <contato></contato>

    <rodape></rodape>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import BannerHome from '@/components/BannerHome/BannerHome.vue'
// import Categorias from '@/components/Categorias/Categorias.vue'
import Sobre from '@/components/Sobre/Sobre.vue'
import Cursos from '@/components/Cursos/Cursos.vue'
import Novidades from '@/components/Novidades/Novidades.vue'
import Contato from '@/components/Contato/Contato.vue'
import Rodape from '@/components/Rodape/Rodape.vue'


export default {
  name: 'HomeView',
  components: {
    HelloWorld,
    BannerHome,
    // Categorias,
    Sobre,
    Cursos,
    Novidades,
    Contato,
    Rodape

  }
}
</script>

<style lang="scss" src="./style.scss" scoped />