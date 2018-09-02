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
             term: 'ShotsFired Rap Battle League',
             items: 5
        }, response => this.videos = response);
    },
    methods() {

    }
 }

</script>