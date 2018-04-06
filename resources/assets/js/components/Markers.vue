<template>
    <div class="info-window">
        <div class="title full-width">{{title}}</div>
        <div class="address">{{address}}</div>
        <div class="content">{{content}}</div>
    </div>
</template>

<script>


    export default {
        name   : "markers",
        data() {

        },
        mounted() {
            initMap('#map');

        },
        methods: {}
    };
</script>

<style scoped>

</style>