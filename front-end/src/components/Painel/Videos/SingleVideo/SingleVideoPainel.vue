<template>
  <div>
    <div class="div-title-video">
      <div class="row">
        <div class="col-11">
          <router-link
            class="active router-menu-video btn mb-3"
            :to="'/painel/modulos/' + id_curso"
            ><i class="bi bi-chevron-double-left"></i> Voltar</router-link
          >
          <h2 class="title">{{ getTituloVideo }}</h2>
          <h6 class="breadcrumb">{{ nomeCurso }} -> {{ titulo_modulo }}</h6>
        </div>
        <div class="col-1">
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
                  v-b-modal.modal-editar-video
                  @click="abrirModalAdicionar(), (showModalEditar = true)"
                >
                  <i class="bi bi-plus mr-4"></i> Adicionar
                </button>
              </b-dropdown-item>
              <b-dropdown-item href="#">
                <button
                  class="dropdown-item btn-warning"
                  v-b-modal.modal-editar-video
                  @click="abrirModalEditar(), (showModalEditar = true)"
                >
                  <i class="bi bi-pencil-square mr-4"></i> Editar
                </button>
              </b-dropdown-item>
              <b-dropdown-item href="#">
                <button
                  class="dropdown-item btn-warning"
                  @click="deletedVideo()"
                >
                  <i class="bi bi-trash mr-4"></i> Excluir
                </button>
              </b-dropdown-item>
            </b-dropdown>
        </div>
      </div>
    </div>
    <div class="video">
      <iframe class="single-video" width="820" height="515" :src="getLinkVideo">
      </iframe>

      <div class="description-video">
        <pre>{{ getDescVideo }}</pre>
      </div>
    </div>    
    <modal
      :video="video"
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
      titulo: "",
      nomeCurso: "",
      titulo_modulo: "",
      id_curso: "",
      video: '',
      showModalEditar: false,
      nr_sequencial_video: ''
    };
  },

  created() {
    this.$store
      .dispatch("modulos/getModulo", { nr_seq_modulo: this.$route.params.id })
      .then((response) => {
        this.titulo_modulo = response.data[0].titulo_modulo;
        this.$store
          .dispatch("modulos/getCursosFromModule", {
            nr_seq_curso: response.data[0].nr_seq_curso,
          })
          .then((response) => {
            this.nomeCurso = response.data.curso.titulo_curso;
            this.id_curso = response.data.curso.nr_sequencial;
          });
      });
  },

  computed: {
    getInformationVideo() {
      const video = this.$store.getters["videos/singleVideo"];

      return video;
    },

    getTituloVideo() {
      const titulo = this.getInformationVideo;

      this.nr_sequencial_video = titulo.nr_sequencial

      return titulo.titulo_video;
    },

    getLinkVideo() {
      const link = this.getInformationVideo;

      return link.link_video;
    },

    getDescVideo() {
      const desc = this.getInformationVideo;

      return desc.ds_video;
    },
  },

  methods: {
    setTitulo(titulo) {
      this.titulo = titulo;
    },
    abrirModalAdicionar() {
      this.metodo = "salvar";
      this.modulo = "";
    },
    abrirModalEditar() {
      this.metodo = "editar";
      this.video = '';
    },
    deletedVideo() {
      const video = {
        nr_sequencial: this.nr_sequencial_video
      }

      this.$swal
        .fire({
          title: "Excluir Vídeo",
          text: "Deseja realmente excluir este vídeo?",
          showCancelButton: true,
          confirmButtonText: "Confirmar",
          icon: "error",
        })
        .then((result) => {
          if (result.isConfirmed) {
            this.$store
              .dispatch("Painelvideos/deletedVideo", { data: video })
              .then((response) => {
                this.$store.dispatch('videos/getAllVideosFromModule', { nr_seq_modulo: this.$route.params.id })
              this.$store.dispatch('videos/getAllVideosFromModule', { nr_seq_modulo: this.$route.params.id })

                this.$emit("closeModalEditar");
                this.$swal.fire({
                  text: "Curso deletado com sucesso!",
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
  },

  components: {
    Modal
  }
};
</script>
  <style lang="scss" src="./style.scss" scoped />
  