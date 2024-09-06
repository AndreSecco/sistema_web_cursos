<template>
  <div class="">
    <div class="allModules">
      <div class="col-12 row line-header">
        <div class="col-9">
          <h6 class="titulo-superior">PAINEL DE MÓDULOS</h6>
          <h1 class="text-left title-cursos mt-2 mb-4">
            Curso: {{ titulo_curso }}
          </h1>
        </div>
        <div class="col-3">
          <button
            class="btn btn-primary btn-xl btn-adicionar"
            v-b-modal.modal-editar-modulo
            @click="abrirModalAdicionar(modulo), (showModalEditar = true)"
          >
            <i class="bi bi-plus-lg h5" style="margin-right: 10px"></i>
            Adicionar
          </button>
        </div>
      </div>
      <div class="col-12 text-left">
        <router-link class="active router-menu-video btn" :to="'/painel/cursos'"
          ><i class="bi bi-chevron-double-left"></i> Voltar</router-link
        >
      </div>
    </div>
    <modal
      :modulo="modulo"
      :metodo="metodo"
      @closeModalEditar="showModalEditar = false"
      v-if="showModalEditar"
    >
    </modal>
  </div>
</template>
<script>
import Modal from "../Modal/Modal.vue";

export default {
  data() {
    return {
      titulo_curso: "",
      showModalEditar: false,
      modulo: "",
      metodo: "",
    };
  },

  components: {
    Modal,
  },

  props: {
    modulo: {},
  },

  methods: {
    deletedCurso(curso) {
      this.$swal
        .fire({
          title: "Excluir Curso",
          text: "Deseja realmente excluir este curso?",
          showCancelButton: true,
          confirmButtonText: "Confirmar",
          icon: "error",
        })
        .then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            this.$store
              .dispatch("", { data: curso })
              .then((response) => {
                this.$store.dispatch("cursos/getAllCursos");
                this.$emit("closeModalEditar");
                this.$swal.fire({
                  position: "top-end",
                  title: "Curso deletado com sucesso!",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                });
              });
          } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
          }
        });
    },
    abrirModalAdicionar() {
      this.metodo = "salvar";
      this.modulo = "";
    },
    abrirModalEditar(modulo) {
      this.metodo = "editar";
      this.modulo = modulo;
    },
  },
  

  created() {
    this.$store
      .dispatch("modulos/getCursosFromModule", {
        nr_seq_curso: this.$route.params.id,
      })
      .then((response) => {
        this.titulo_curso = response.data.curso.titulo_curso;
      });
  },
};
</script>
<style lang="scss" src="./style.scss" scoped />