<template>
  <div class="col-12">
    <div class="col-12 row section-cursos">
      <div class="col-12 row line-header">
        <div class="col-9">
          <h6 class="titulo-superior">PAINEL DE CURSOS</h6>
          <h1 class="text-left title-cursos mt-2 mb-4">
            Todos os <span class="palavras-coloridas">cursos</span>!
          </h1>
        </div>
        <div class="col-3">
          <button
            class="btn btn-primary btn-xl btn-adicionar"
            v-b-modal.modal-editar
            @click="abrirModalAdicionar(), (showModalEditar = true)"
          >
            <i class="bi bi-plus-lg h5" style="margin-right: 10px"></i>
            Adicionar
          </button>
        </div>
      </div>
      <hr />
      <div class="todos-cursos-free row mt-5">
        <div
          class="col-4"
          v-for="curso in getAllCursos"
          :key="curso.nr_sequecial"
        >
          <div class="cardCursos cardGtrans">
            <div class="row">
              <div class="col-10">
                <p
                  class="title"
                  :style="backgroundTitulo(curso.cor_titulo_curso)"
                >
                  {{ curso.titulo_curso }}
                </p>
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
                      v-b-modal.modal-editar
                      @click="abrirModalEditar(curso), (showModalEditar = true)"
                    >
                      <i class="bi bi-pencil-square mr-4"></i> Editar
                    </button>
                  </b-dropdown-item>
                  <b-dropdown-item href="#">
                    <button
                      class="dropdown-item btn-warning"
                      @click="deletedCurso(curso)"
                    >
                      <i class="bi bi-trash mr-4"></i> Excluir
                    </button>
                  </b-dropdown-item>
                </b-dropdown>
              </div>
              <h6 class="subtitle">{{ curso.subtitulo_curso }}</h6>
            </div>
            <span class="text">
              {{ curso.ds_curso }}
            </span>
            <router-link
              :to="'/painel/modulos/' + curso.nr_sequencial"
              class="btn btn-outline-secondary btn-cursos"
              ><i class="bi bi-layers"></i> Acessar Módulos</router-link
            >
          </div>
        </div>
      </div>
    </div>
    <modal
      :curso="curso"
      :metodo="metodo"
      @closeModalEditar="showModalEditar = false"
      v-if="showModalEditar"
    >
    </modal>
  </div>
</template>
<script>
import Modal from "./Modal/Modal.vue";

export default {
  data() {
    return {
      showModalEditar: false,
      curso: "",
      metodo: "",
    };
  },

  components: {
    Modal,
  },

  computed: {
    getAllCursos() {
      const allCursos = this.$store.getters["cursos/allCursos"];

      return allCursos;
    },
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
              .dispatch("Painelcurso/deletedCurso", { data: curso })
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
      this.curso = "";
    },
    abrirModalEditar(curso) {
      this.metodo = "editar";
      this.curso = curso;
    },
    backgroundTitulo(cor) {
      return `background-color: ${cor}`;
    },
  },

  created() {
    this.$store.dispatch("cursos/getAllCursos");
  },
};
</script>
<style lang="scss" src="./style.scss" scoped />
