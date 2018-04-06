<template>
    <div class="info-window">
        <div class="title full-width">{{title}}</div>
        <div class="address">{{address}}</div>
        <div class="content">{{content}}</div>
    </div>
</template>

<script>
    var vue;
    export default {
        name   : "marker-info",
        data() {
            vue = this;
            return {
                title  : '',
                address: '',
                content: ''
            };
        },
        mounted() {

        },
        methods: {
            setValues: function (data) {
                _.forEach(data, function (value, key) {
                    console.log(key,value);
                    vue[key] = value;
                });

            }
        }
    };
</script>

<style scoped>

</style>