<template>
  <div>
    <b-modal id="modal-editar" centered size="lg" title="Editar Curso!">
      <template #modal-header="{ close }">
        <h5>Editar Curso</h5>
        <b-button size="sm btn-close-modal" @click="close(), $emit('closeModalEditar', false)">
          <i class="bi bi-x-lg"></i>
        </b-button>
      </template>

      <template #default="{}">
        <div class="col-12 div-editar-curso">
          <div class="row" style="align-items: self-end">
            <div class="col-10">
              <label for="titulo-curso">Título do Curso</label>
              <input
                v-model="titulo_curso"
                type="text"
                id="titulo-curso"
                class="form-control"
              />
            </div>
            <div class="col-2">
              <label for="cor">Cor Título</label>
              <input
                v-model="cor_titulo_curso"
                type="color"
                id="cor"
                class="form-control input-cor"
                value="#e66465"
              />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <label for="subtitulo_curso">Subtítulo</label>
              <input
                v-model="subtitulo_curso"
                class="form-control"
                id="subtitulo_curso"
              />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <label for="desc_curso">Descrição do Curso</label>
              <textarea
                v-model="desc_curso"
                class="form-control"
                id="desc_curso"
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
          <b-button class="btn btn-success btn-adicionar" @click="submitUpdated">Salvar </b-button>
        </div>
      </template>
    </b-modal>
  </div>
</template>
<script>

import { Toast } from 'bootstrap';

export default {
  data() {
    return {
      titulo_curso: "",
      cor_titulo_curso: "",
      subtitulo_curso: "",
      desc_curso: "",
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

    submitUpdated(){
        const data = {
            titulo_curso: this.titulo_curso,
            cor_titulo_curso: this.cor_titulo_curso,
            subtitulo_curso: this.subtitulo_curso,
            desc_curso: this.desc_curso,
            nr_sequencial: this.curso.nr_sequencial
        }

        if(this.metodo == 'editar'){
          this.$store.dispatch('Painelcurso/submitUpdated', { data: data }).then(response => {
              if(response){
                  this.$store.dispatch("cursos/getAllCursos");
                  this.$emit('closeModalEditar')
                  this.$swal.fire({
                    text: 'Dados editados com sucesso!', 
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                  })
              }
          })
        } else if(this.metodo == 'salvar') {
          if(this.validateCreate()){
            this.$store.dispatch('Painelcurso/submidCreated', { data: data }).then(response => {
              if(response){
                this.$store.dispatch("cursos/getAllCursos");
                  this.$emit('closeModalEditar')
                  this.$swal.fire({
                    text: 'Dados salvos com sucesso!', 
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                  })
              }
            })
          }
        }
    },

    validateCreate(){
      if(this.titulo_curso && this.subtitulo_curso && this.desc_curso){
        return true
      }

      this.$swal.fire({
        title: 'Ooops!',
        text: 'Insira todas as informações!',
        icon: 'error'
      })
      return false
    },
  },

  created() {
    console.log(this.curso)
    this.titulo_curso = this.curso.titulo_curso,
    this.cor_titulo_curso = this.curso.cor_titulo_curso,
    this.subtitulo_curso = this.curso.subtitulo_curso,
    this.desc_curso = this.curso.ds_curso;

    console.log(this.metodo)
  },

  props: {
    curso: {},
    metodo: {}
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />
