<template>
    <label>
        {{ label }}
        <textarea v-model="model" :name="name" :cols="colsStr" :rows="rowsStr" :maxlength="maxlength"></textarea>
    </label>
</template>

<script>
    export default {
        name: "textarea-field",
        props: [
            'model',
            'name',
            'label',
            'class',
            'maxlength',
            'cols',
            'rows'
        ],
        data() {
            return {
                classStr: this.class || '',
                colsStr: this.cols || 30,
                rowsStr: this.rows || 5,
            }
        }
    };
</script>

<style scoped>

</style>