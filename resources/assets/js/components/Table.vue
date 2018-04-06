<template>

</template>

<script>
    import {table} from '../mixins/table';

    var vue,
        URLSearchParams = require('url-search-params'),
        params          = new URLSearchParams(location.search);

    export default {
        name   : "table-render",
        props  : [
            'table-data',
            'options'
        ],
        mixins: table
    };
</script>

<style scoped>

</style>