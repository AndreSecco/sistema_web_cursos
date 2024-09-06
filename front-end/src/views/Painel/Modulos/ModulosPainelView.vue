<template>
  <div>
    <div class="painel-modulos">


    <all-modules-painel></all-modules-painel>

    <div class="todosModulos">
      <modules-painel 
        v-for="modulo in getModulos" 
        :key="modulo.nr_sequencial"
        :modulo="modulo">
      </modules-painel>
    </div>
  </div>

    <rodape></rodape>
  </div>
</template>
<script>
import AllModulesPainel from '@/components/Painel/Modulos/allModules/allModulesPainel.vue';
import ModulesPainel from '@/components/Painel/Modulos/Modules/ModulesPainel.vue';
import Rodape from '@/components/Rodape/Rodape.vue'

export default {
  components: {
    AllModulesPainel,
    ModulesPainel,
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
}
</script>

<style lang="scss" src="./style.scss" scoped />
