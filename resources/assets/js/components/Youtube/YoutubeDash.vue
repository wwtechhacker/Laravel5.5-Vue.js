<template>
    <div class="YoutubeDash-wrapper">
         <!-- Videos Search
         <video-group :videos="videos"></video-group> -->
         Video Playlists
         <video-group :playlists="filtered"></video-group>
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
             playlists: [],
             filtered: null
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
        }, (data) => {
                this.playlists = data;
                this.byName(this.playlists);
                this.filtered = this.playlists.filter(function(item) {
                    return item.snippet.title !== 'Gryffin';
                });
                this.filtered = this.playlists.filter(function(item) {
                    return item.snippet.title !== 'Tony T';
                });
                this.filtered = this.playlists.filter(function(item) {
                    return item.snippet.title !== 'K Philosophy';
                });
        });
    },
    methods: {
        byDate(data) {
            data.sort(function(a,b) {
                let dateA = new Date(a.snippet.publishedAt);
                let dateB = new Date(b.snippet.publishedAt);
                return dateB - dateA
            })
        },
        byName(data) {
            data.sort(function(a,b) {
                let nameA = a.snippet.title
                let nameB = b.snippet.title
                if(nameA < nameB) {
                    return -1;
                } else if (nameA > nameB) {
                    return 1;
                } else {
                    return 0
                }
            })
        },
        removeLists(arr, list) {
            
        }
    }
 }

</script>