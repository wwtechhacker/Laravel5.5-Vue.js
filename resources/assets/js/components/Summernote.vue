<template>
    <form method="post">
        <textarea id="summernote" name="editordata"></textarea>
        <input type="button" class="button" value="save" @click="save"/>
    </form>

</template>

<script>
    require('summernote/dist/summernote-lite.css');
    require('summernote/dist/summernote-lite.js');

    export default {
        name: "summernote",
        mounted() {
            $('#summernote').summernote();
        },
        methods:{
            save: function () {
                var code = $('#summernote').summernote('code');
                console.log(code);
                debugger;
            }
        }
    };
</script>

<style scoped>

</style>