<template>
  <div class="">
    <div class="allModules">
        <div class="col-12">
        <h6 class="titulo-superior ">TODOS OS MÓDULOS</h6>
        <h1 class="text-left title-cursos mt-2 mb-4">Selecione um <span class="palavras-coloridas">módulo</span>, <br>
            para acessar as vídeo <span class="palavras-coloridas">aulas</span>!</h1>
      </div>
      <div class="col-12 text-left">
        <router-link class="active router-menu-video btn" :to="'/'"><i class="bi bi-chevron-double-left"></i> Voltar</router-link>
      </div>
    </div>
  </div>
</template>
<script>
export default {

};
</script>
<style lang="scss" src="./style.scss" scoped />