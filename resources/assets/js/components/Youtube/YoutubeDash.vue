<template>
    <div class="YoutubeDash-wrapper">
         Videos Dashboard Works
         <video-group :videos="videos"></video-group>
    </div>
</template>

<script>

import YoutubeAPI from './Youtube.js';
import VideoGroup from './VideoGroup.vue';

 export default {
    components: {
        VideoGroup
    },
    data() {
         return  {
             videos: null
         }
    },
    created() {
        YoutubeAPI({
             apiKey: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
             term: 'Shots Fired Battle League',
             items: 50
        }, response => this.videos = response);
    },
    methods() {

    }
 }

</script>