<template>
  <div>
    <b-modal id="modal-editar-modulo" centered size="lg" title="Editar Modulo!">
      <template #modal-header="{ close }">
        <h5>Editar Módulo</h5>
        <b-button size="sm btn-close-modal" @click="close(), $emit('closeModalEditar', false)">
          <i class="bi bi-x-lg"></i>
        </b-button>
      </template>

      <template #default="{}">
        <div class="col-12 div-editar-modulo">
          <div class="row" style="align-items: self-end">
            <div class="col-10">
              <label for="titulo-modulo">Título do Módulo</label>
              <input
                v-model="titulo_modulo"
                type="text"
                id="titulo-modulo"
                class="form-control"
              />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <label for="desc_modulo">Descrição do Módulo</label>
              <textarea
                v-model="desc_modulo"
                class="form-control"
                id="desc_modulo"
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
      titulo_modulo: "",
      desc_modulo: "",
    };
  },

  methods: {
    converterCores(r, g, b) {
      "#" +
        [r, g, b]
          .map((x) => {
            const hex = x.toString(16);
            return hex.length === 1 ? "0" + hex : hex;
          })
          .join("");
    },

    submitUpdated() {
      const data = {
        titulo_modulo: this.titulo_modulo,
        desc_modulo: this.desc_modulo,
        nr_seq_curso: this.$route.params.id,
        nr_sequencial: this.modulo.nr_sequencial
      };

      if (this.metodo == "editar") {
        this.$store
          .dispatch("Painelmodulos/submitUpdated", { data: data })
          .then((response) => {
            if (response) {
              this.$store.dispatch("modulos/getModulos", { nr_seq_curso: this.$route.params.id });
              this.$emit("closeModalEditar");
              this.$swal.fire({
                text: "Dados editados com sucesso!",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
              });
            }
          });
      } else if (this.metodo == "salvar") {
        if (this.validateCreate()) {
          this.$store
            .dispatch("Painelmodulos/submidCreated", { data: data })
            .then((response) => {
              if (response) {
                this.$store.dispatch("modulos/getModulos", { nr_seq_curso: this.$route.params.id });
                this.$emit("closeModalEditar");
                this.$swal.fire({
                  text: "Dados salvos com sucesso!",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                });
              }
            });
        }
      }
    },

    validateCreate() {
      if (this.titulo_modulo && this.desc_modulo) {
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
    (this.titulo_modulo = this.modulo.titulo_modulo),
      (this.desc_modulo = this.modulo.ds_modulo);

  },

  props: {
    modulo: {},
    metodo: {},
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />
