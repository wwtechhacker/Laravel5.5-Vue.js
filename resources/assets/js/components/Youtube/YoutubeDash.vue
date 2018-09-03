<template>
    <div class="YoutubeDash-wrapper">
         <!-- Videos Search
         <video-group :videos="videos"></video-group> -->
         Video Playlists
         <video-group :playlists="playlists"></video-group>
    </div>
</template>

<script>

import Youtube_Search from './Youtube_Search.js';
import Youtube_Playlists from './Youtube_Playlists.js';
// import Youtube_Videos from './Youtube_Videos.js';

import VideoGroup from './VideoGroup.vue';

 export default {
    components: {
        VideoGroup
    },
    data() {
         return  {
             videos: null,
             playlists: null
         }
    },
    created() {
        // Youtube_Search({
        //      apiKey: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
        //      term: 'Shots Fired Battle League',
        //      items: 50
        // }, response => this.videos = response);
        Youtube_Playlists({
            channelID: 'UCKNI-azGi0HPo072EwKwMbA'
        }, data => this.playlists = data);
    },
    methods() {

    }
 }

</script>