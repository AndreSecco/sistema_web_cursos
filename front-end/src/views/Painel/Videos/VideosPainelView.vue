<template>
    <div>
        <div class="row col-12 div-principal-video">
            <div class="col-8 div-single-video">
                <single-video-painel></single-video-painel>

                <!-- <description-video></description-video> -->
            </div>
            <div class="col-3 div-single-menu">
                <menu-videos>
                </menu-videos>
            </div>
        </div>
    </div>
</template>
<script>
import SingleVideoPainel from '@/components/Painel/Videos/SingleVideo/SingleVideoPainel.vue'
// import DescriptionVideo from '@/components/Video/DescriptionVideo/DescriptionVideo.vue';
import MenuVideos from '@/components/Video/MenuVideos/MenuVideos.vue';
import videos from '@/store/modules/videos';

export default {
    components: {
        SingleVideoPainel,
        // DescriptionVideo,
        MenuVideos
    },


    created() {
        this.$store.dispatch('videos/getAllVideosFromModule', { nr_seq_modulo: this.$route.params.id })

        if(this.$route.params.nrVideo !== null) {
            this.$store.dispatch('videos/getSingleVideo', { nr_seq_video: this.$route.params.nrVideo })
        }
    }
}
</script>

<style lang="scss" src="./style.scss" scoped />
