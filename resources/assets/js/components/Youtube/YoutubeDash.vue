<template>
    <div class="YoutubeDash-wrapper">
         Videos Dashboard Works
         <video-group :videos="videos"></video-group>
    </div>
</template>

<script>

import Youtube_Search from './Youtube_Search.js';
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
        Youtube_Search({
             apiKey: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
             term: 'Shots Fired Battle League',
             items: 50
        }, response => this.videos = response);
    },
    methods() {

    }
 }

</script>