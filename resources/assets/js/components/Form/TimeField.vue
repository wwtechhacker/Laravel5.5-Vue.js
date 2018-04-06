<template>
    <label>
        {{ label }}
        <input type="text" v-model="model" class="timepicker" :class="classStr" :name="name"/>
    </label>
</template>

<script>
    export default {
        name: "time-field",
        props: [
            'model',
            'name',
            'label',
            'class'
        ],
        data() {
            return {
                classStr: this.class || ''
            }
        }
    };
</script>

<style scoped>

</style>