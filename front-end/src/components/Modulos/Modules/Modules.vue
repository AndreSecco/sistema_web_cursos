<template>
  <div>
    <div class="col-12">
      <div class="col-12 cardModule">
        <div class="col-12">
          <p class="title-card-module">{{ modulo.titulo_modulo }}</p>
        </div>
        <div class="row footer-card-module">
          <div class="col-10">
            <p class="text-module">
              {{ modulo.ds_modulo }}
            </p>
          </div>
          <div class="col-2">
            <router-link :to="'/video/' + modulo.nr_sequencial + '/'" class="btn btn-play-novidade" replace>
              <i class="bi bi-box-arrow-right h2"></i>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    modulo: {}
  }
}
</script>

<style lang="scss" src="./style.scss" scoped />
