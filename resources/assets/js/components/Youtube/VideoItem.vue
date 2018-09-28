<template>
    <a :href="playlistLink">
        <div class="videoItem-wrapper">
            <div class="card">
                <!-- <div class="card-divider">
                    {{ videoTitle }}
                </div>
                <img :src="imgSrc" :alt="videoTitle">
                <div class="card-section">
                    <p>
                        {{ videoDescription }}
                    </p>
                </div> -->
                <div class="card-divider">
                    {{ playlistTitle }}
                </div>
                <img :src="playlistIMGSrc" :alt="playlistTitle">
                <!-- <div class="card-section">
                    <p>
                        {{ videoDescription }}
                    </p>
                </div> -->
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        props: ['video', 'playlist'],
        computed: {
            videoTitle() {
                return this.video.snippet.title;
            },
            videoDescription() {
                return this.video.snippet.description;
            },
            imgSrc() {
                return this.video.snippet.thumbnails.high.url;
            },
            playlistTitle() {
                return this.playlist.snippet.title;
            },
            playlistIMGSrc() {
                return this.playlist.snippet.thumbnails.high.url;
            },
            playlistLink() {
                return 'https://www.youtube.com/playlist?list=' + this.playlist.id;
            }
        }
    }

</script>

<style lang="scss">
.videoItem-wrapper {
    .card {
        width: 96%;
        .card-section p {
            color: black;
        }
    } 
    
}
</style>