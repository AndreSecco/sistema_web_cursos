<template>
  <div>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div id="banner01" class="bannerHome">
            <div class="container px-4 px-lg-5 h-100">
              <div
                class="row gx-4 gx-lg-5 h-100 align-items-left justify-content-left text-left ml-4 container-escrita-banner"
              >
                <div class="col-lg-8 align-self-end text-left">
                  <h6 class="titulo-superior ">INICIE HOJE MESMO </h6>
                  <h1 class="title-principal text-white font-weight-bold">
                    Todo conhecimento disponível para você
                  </h1>
                  <!-- <hr /> -->
                </div>
                <div class="col-lg-8 align-self-baseline">
                  <p class="text-white-75 mb-5 subtitle">
                    Nesta plataforma você irá encontrar vídeos explicativos
                    clique a clique com seus materiais e apoio sobre cada
                    sistema.
                  </p>

                  <a class="btn btn-primary btn-xl btn-banner-principal" href="#cursos"
                    >Começar agora!  <i class="bi bi-play-circle-fill h5" style="margin-left: 10px"></i></a
                  >
                  <a
                    class="btn btn-outline btn-xl btn-banner-secondary"
                    style="color: #fff; border: 1px solid #fff"
                    href="#novidades"
                    >Últimos Vídeos!</a
                  >
                </div>
                <social-icons ></social-icons>

              </div>
            </div>
          </div>
        </div>
        <!-- <div class="carousel-item">
          <div id="banner02" class="bannerHome">
            <div class="container px-4 px-lg-5 h-100">
              <div
                class="row gx-4 gx-lg-5 h-100 align-items-left justify-content-left text-left ml-4 container-escrita-banner"
              >
                <div class="col-lg-8 align-self-end text-left">
                  <h6 class="titulo-superior ">INICIE HOJE MESMO</h6>
                  <h1 class="title-principal text-white font-weight-bold">
                    Todo conhecimento disponível para você
                  </h1>
                </div>
                <div class="col-lg-8 align-self-baseline">
                  <p class="text-white-75 mb-5 subtitle">
                    Nesta plataforma você irá encontrar vídeos explicativos
                    clique a clique com seus materiais e apoio sobre cada
                    sistema.
                  </p>

                  <a class="btn btn-primary btn-xl btn-banner-principal" href="#cursos"
                    >Começar agora!  <i class="bi bi-play-circle-fill h5" style="margin-left: 10px"></i></a
                  >
                  <a
                    class="btn btn-outline btn-xl btn-banner-secondary"
                    style="color: #fff; border: 1px solid #fff"
                    href="#sobre"
                    >Saiba Mais!</a
                  >
                </div>
                <social-icons ></social-icons>

              </div>
            </div>
          </div>
        </div> -->
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>
<script>
import SocialIcons from '@/components/SocialIcons/SocialIcons.vue'

export default {
  name: "BannerHome",
  components: {
    SocialIcons
  }
};
</script>
<style lang="scss" src="./style.scss" scoped />
