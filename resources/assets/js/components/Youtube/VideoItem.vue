<template>
    <div class="videoItem-wrapper">
        <div class="card" style="width: 300px;">
            <div class="card-divider">
                {{ videoTitle }}
            </div>
            <img :src="imgSrc" :alt="videoTitle">
            <div class="card-section">
                <p>
                    {{ videoDescription }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['video'],
        computed: {
            videoTitle() {
                return this.video.snippet.title;
            },
            videoDescription() {
                return this.video.snippet.description;
            },
            imgSrc() {
                return this.video.snippet.thumbnails.high.url;
            }
        }
    }

</script>