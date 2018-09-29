<template>
    <a :href="playlistLink">
        <div class="sidebar-item">
            <div class="card">
                <div class="card-divider">
                    {{ playlistTitle }}
                </div>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        props: ['playlist'],
        computed: {
            playlistTitle() {
                return this.playlist.snippet.title;
            },
            playlistLink() {
                return  `/${this.playlist.snippet.title}`;
            }
        }
    }

</script>

<style lang="scss">

</style>