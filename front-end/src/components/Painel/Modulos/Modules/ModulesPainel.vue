<template>
  <div>
    <div class="col-12">
      <div class="col-12 cardModule">
        <div class="row">
          <div class="col-10">
            <p class="title-card-module">{{ modulo.titulo_modulo }}</p>
          </div>
          <div class="col-2">
            <b-dropdown
              id="dropdown-right"
              right
              toggle-class="text-decoration-none"
              no-caret
              variant="outline-secondary"
            >
              <template #button-content>
                <i class="bi bi-list" style="color: #fff"></i>
              </template>
              <b-dropdown-item href="#">
                <button
                  class="dropdown-item btn-warning"
                  v-b-modal.modal-editar-modulo
                  @click="abrirModalEditar(modulo), (showModalEditar = true)"
                >
                  <i class="bi bi-pencil-square mr-4"></i> Editar
                </button>
              </b-dropdown-item>
              <b-dropdown-item href="#">
                <button
                  class="dropdown-item btn-warning"
                  @click="deletedModulo(modulo)"
                >
                  <i class="bi bi-trash mr-4"></i> Excluir
                </button>
              </b-dropdown-item>
            </b-dropdown>
          </div>
        </div>

        <div class="row footer-card-module">
          <div class="col-10">
            <p class="text-module">
              {{ modulo.ds_modulo }}
            </p>
          </div>
          <div class="col-2">
            <router-link
              :to="'/painel/video/' + modulo.nr_sequencial + '/'" 
              class="btn btn-play-novidade"
            >
              <i class="bi bi-box-arrow-right h2"></i>
            </router-link>
          </div>
        </div>
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
    deletedModulo(modulo) {
      this.$swal
        .fire({
          title: "Excluir Módulo",
          text: "Deseja realmente excluir este modulo?",
          showCancelButton: true,
          confirmButtonText: "Confirmar",
          icon: "error",
        })
        .then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            this.$store
              .dispatch("Painelmodulos/deletedModulo", { data: modulo })
              .then((response) => {
                this.$store.dispatch("modulos/getModulos", { nr_seq_curso: this.$route.params.id });
                this.$emit("closeModalEditar");
                this.$swal.fire({
                  text: "Curso deletado com sucesso!",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }).catch( error => {
                this.$swal.fire({
                  title: 'Oops!',
                  text: "Existem vídeos dentro deste módulo, exclua-os antes!",
                  icon: 'error',

                })
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
};
</script>

<style lang="scss" src="./style.scss" scoped />
