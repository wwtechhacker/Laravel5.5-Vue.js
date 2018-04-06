<template>
    <label>
        {{ label }}
        <datepicker v-model="model" :name="name" input-class="vue-datepicker" :format="formatStr"></datepicker>
    </label>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        name: "date-field",
        components: {
            Datepicker
        },
        props: [
            'model',
            'name',
            'label',
            'class',
            'format'
        ],
        data() {
            return {
                classStr: this.class || '',
                formatStr: this.format || 'MMMM d, yyyy'
            }
        }
    };
</script>

<style scoped>

</style>