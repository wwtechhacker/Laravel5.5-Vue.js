<template>
    <ul class="sidebar-wrapper">
         <l1 :playlists="filteredPlaylists"></l1>
    </ul>
</template>

<script>

 export default {
    components: {
        // VideoGroup
    },
    data() {
         return  {
             videos: null,
             videoPlaylists: [],
         }
    },
    created() {


    },
    methods: {
    }
 }

</script>