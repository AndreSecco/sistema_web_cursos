<template>
  <div>
    <banner-modulos></banner-modulos>

    <all-modules></all-modules>

    <div class="todosModulos">
      <modules 
        v-for="modulo in getModulos" 
        :key="modulo.nr_sequencial"
        :modulo="modulo">
      </modules>
    </div>

    <rodape></rodape>

  </div>
</template>

<script>
import BannerModulos from "@/components/Modulos/BannerModulos/BannerModulos.vue";
import AllModules from '@/components/Modulos/allModules/allModules.vue';
import Modules from '@/components/Modulos/Modules/Modules.vue';
import Rodape from '@/components/Rodape/Rodape.vue'


export default {
  components: {
    BannerModulos,
    AllModules,
    Modules,
    Rodape
  },

  computed: {
    getModulos(){
      const modulos = this.$store.getters['modulos/allModulos']

      return modulos
    }
  },
  
  created() {
    this.$store.dispatch('modulos/getModulos', { nr_seq_curso: this.$route.params.id })
  }
};
</script>

<style lang="scss" src="./style.scss" scoped />
