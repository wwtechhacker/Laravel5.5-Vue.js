<template>
    <label>
        {{ label }}
        <select v-model="model" :name="name" :class="classStr">
            <option v-if="isArray" v-for="(option, key) in options" :value="option">{{option}}</option>
            <option v-if="!isArray" v-for="(key, option) in options" :value="key">{{option}}</option>
        </select>
    </label>
</template>

<script>
    export default {
        name: "select-field",
        props: [
            'name',
            'model',
            'label',
            'options',
            'class',
        ],
        data() {

            return {
                isArray: _.isArray(this.options),
                classStr: this.class || ''
            }
        }
    };
</script>

<style scoped>

</style>