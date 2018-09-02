<template>
    <div class="YoutubeDash-wrapper">
         Videos Dashboard WOrks
    </div>
</template>



<script>

import YoutubeAPI from './Youtube.js';

 export default {
    data() {
         return  {
             videos: null
         }
    },
    created() {
        YoutubeAPI({
             apiKey: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
             term: 'ShotsFired Rap Battle League',
             items: 50
        }, response => this.videos = response);
    },
    methods() {

    }
 }

</script>