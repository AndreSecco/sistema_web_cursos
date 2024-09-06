<template>
    <div>
        <div class="row col-12 div-principal-video">
            <div class="col-8 div-single-video">
                <single-video></single-video>

                <!-- <description-video></description-video> -->
            </div>
            <div class="col-3 div-single-menu">
                <menu-videos-painel>
                </menu-videos-painel>
            </div>
        </div>
    </div>
</template>
<script>
import SingleVideo from '@/components/Video/SingleVideo/SingleVideo.vue'
// import DescriptionVideo from '@/components/Video/DescriptionVideo/DescriptionVideo.vue';
import MenuVideosPainel from '@/components/Painel/Videos/MenuVideos/MenuVideosPainel.vue';
import videos from '@/store/modules/videos';

export default {
    components: {
        SingleVideo,
        // DescriptionVideo,
        MenuVideosPainel
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
