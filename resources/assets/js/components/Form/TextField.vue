<template>
    <label>
        {{ label }}
        <input v-model="text" :class="classStr" :name="name" type="text"/>
    </label>
</template>

<script>
    export default {
        name: "text-field",
        props: [
            'text',
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