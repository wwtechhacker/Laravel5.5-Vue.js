<template>
    <div class="sidebar-wrapper">
         <video-group :playlists="filteredPlaylists"></video-group>
    </div>
</template>

<script>

// import Youtube_Search from './Youtube_Search.js';
import Youtube_Playlists from './Youtube_Playlists.js';
// import Youtube_Videos from './Youtube_Videos.js';

import SidebarItem from './SidebarItem.vue';

 export default {
    components: {
    },
    data() {
         return  {
             videos: null,
             videoPlaylists: [],
             filteredPlaylists: null
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
                this.videoPlaylists = data;
                this.filteredPlaylists = this.videoPlaylists.filter(function(item) {
                    return item.snippet.title !== 'Gryffin' && item.snippet.title !== 'K Philosophy' && item.snippet.title !== 'Tony T' && item.snippet.title !== 'Zevil' && item.snippet.title !== '#SDiferente Match Up Announcements' && item.snippet.title !== 'SPRING CLEANING MATCH UP ANNOUNCEMENTS';
                });
                this.AtoZ(this.filteredPlaylists, false);
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
        AtoZ(data, reverse) {
            data.sort(function(a,b) {
                let nameA = a.snippet.title
                let nameB = b.snippet.title
                
                if(nameA < nameB) {
                    if(reverse) {
                        return 1;
                    }
                    return -1;
                } else if (nameA > nameB) {
                    if(reverse) {
                        return -1;
                    }
                    return 1;
                } else {
                    return 0
                }
            })
        }
    }
 }

</script>