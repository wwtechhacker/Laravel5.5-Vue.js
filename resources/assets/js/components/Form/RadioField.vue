<template>
    <fieldset :class="classStr">
        <legend>{{ label }}</legend>
        <label v-for="option in options">
            <input v-model="model" type="radio" :name="name" :value="option"/>
            {{option}}
        </label>
    </fieldset>
</template>

<script>
    export default {
        name : "radio-field",
        props: [
            'name',
            'model',
            'label',
            'options',
            'class',
        ],
        data() {
            return {
                classStr: this.class || ''
            };
        }
    };
</script>

<style scoped>

</style>