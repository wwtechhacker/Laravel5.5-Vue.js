<template>
    <div class="videoGroup-wrapper">
        <video-item 
            v-for="video in videos" 
            :video="video"
            :key="video.id.videoId">
        </video-item>
    </div>
</template>

<script>

    import VideoItem from './VideoItem.vue'

    export default {
        props: ['videos'],
        components: {
            VideoItem
        }
    }

</script>
