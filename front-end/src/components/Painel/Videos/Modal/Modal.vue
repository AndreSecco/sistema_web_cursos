<template>
  <div>
    <b-modal id="modal-editar-video" centered size="lg" title="Editar Vídeo!">
      <template #modal-header="{ close }">
        <h5>Editar Vídeo</h5>
        <b-button
          size="sm btn-close-modal"
          @click="close(), $emit('closeModalEditar', false)"
        >
          <i class="bi bi-x-lg"></i>
        </b-button>
      </template>

      <template #default="{}">
        <div class="col-12 div-editar-titulo">
          <div class="row" style="align-items: self-end">
            <div class="col-10">
              <label for="titulo-video">Título do Vídeo</label>
              <input
                v-model="titulo_video"
                type="text"
                id="titulo-video"
                class="form-control"
              />
            </div>
          </div>
          <div class="row mt-3" style="align-items: self-end">
            <div class="col-10">
              <label for="titulo-video">Link Vídeo</label>
              <input
                v-model="link_video"
                type="text"
                id="titulo-video"
                class="form-control"
              />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <label for="desc_video">Descrição do Módulo</label>
              <textarea
                v-model="desc_video"
                class="form-control"
                id="desc_video"
                cols="30"
                rows="5"
              ></textarea>
            </div>
          </div>
        </div>
      </template>

      <template #modal-footer="{ close }">
        <div class="">
          <b-button
            class="btn-cancelar m-1"
            @click="close(), $emit('closeModalEditar', false)"
            >Cancelar</b-button
          >
          <b-button class="btn btn-success btn-adicionar" @click="submitUpdated"
            >Salvar
          </b-button>
        </div>
      </template>
    </b-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      titulo_video: "",
      link_video: "",
      desc_video: "",
      nr_sequencial: "",
    };
  },

  computed: {
    getInformationVideo() {
      const video = this.$store.getters["videos/singleVideo"];

      return video;
    },

    getTituloVideo() {
      const titulo = this.getInformationVideo;

      this.titulo_video = titulo.titulo_video;

      this.nr_sequencial = titulo.nr_sequencial;

      return titulo.titulo_video;
    },

    getLinkVideo() {
      const link = this.getInformationVideo;

      this.link_video = link.link_video;

      return link.link_video;
    },

    getDescVideo() {
      const desc = this.getInformationVideo;

      this.desc_video = desc.ds_video;

      return desc.ds_video;
    },
  },

  methods: {
    submitUpdated() {
      const data = {
        titulo_video: this.titulo_video,
        link_video: this.link_video,
        desc_video: this.desc_video,
        nr_seq_modulo: this.$route.params.id,
        nr_sequencial: this.nr_sequencial,
      };

      if (this.metodo == "editar") {
        console.log(data);
        this.$store
          .dispatch("Painelvideos/submitUpdated", { data: data })
          .then((response) => {
            if (response) {
              this.$store.dispatch("videos/getAllVideosFromModule", {
                nr_seq_modulo: this.$route.params.id,
              });
              this.$store.dispatch("videos/getSingleVideo", {
                nr_seq_video: this.nr_sequencial,
              });
              this.$emit("closeModalEditar");
              this.$swal.fire({
                text: "Dados editados com sucesso!",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
              });
            }
          })
          .catch((error) => {
            this.$swal.fire({
              title: "Oops!",
              text: "Erro ao editar o vídeo!",
              icon: "error",
            });
          });
      } else if (this.metodo == "salvar") {
        if (this.validateCreate()) {
          this.$store
            .dispatch("Painelvideos/submidCreated", { data: data })
            .then((response) => {
              if (response) {
                this.$store.dispatch("videos/getAllVideosFromModule", {
                  nr_seq_modulo: this.$route.params.id,
                });
                this.$store.dispatch("videos/getSingleVideo", {
                  nr_seq_video: response.data.nr_sequencial,
                });
                this.$emit("closeModalEditar");
                this.$swal.fire({
                  text: "Dados salvos com sucesso!",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }
            })
            .catch((error) => {
              this.$swal.fire({
                title: "Oops!",
                text: "Erro ao editar o vídeo!",
                icon: "error",
              });
            });
        }
      }
    },

    validateCreate() {
      if (this.titulo_video && this.link_video && this.desc_video) {
        return true;
      }

      this.$swal.fire({
        title: "Ooops!",
        text: "Insira todas as informações!",
        icon: "error",
      });
      return false;
    },
  },

  created() {
    if (this.metodo == "editar") {
      this.getDescVideo;
      this.getTituloVideo;
      this.getLinkVideo;
    }
  },

  props: {
    video: {},
    metodo: {},
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />