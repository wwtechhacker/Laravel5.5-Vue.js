<template>
    <div class="videoGroup-wrapper">
        
        <video-item 
            v-for="playlist in playlists" 
            :playlist="playlist"
            :key="playlist.snippet.title">
        </video-item>
        
    </div>
</template>

<script>

    import VideoItem from './VideoItem.vue'

    export default {
        props: ['playlists'],
        components: {
            VideoItem
        },
        data() {

        },
        created() {
            
        }
    }

</script>

<style scoped>
    .videoGroup-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
</style>
