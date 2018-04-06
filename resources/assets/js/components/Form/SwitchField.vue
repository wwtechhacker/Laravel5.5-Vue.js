<template>
    <div class="switch-field" :class="classStr">
        <label>{{label}}</label>
        <div class="switch" :class="[sizeClass]">
            <input v-model="model" class="switch-input" :id="name" :name="name" type="checkbox">
            <label class="switch-paddle" v-bind:for="name">
                <span class="show-for-sr">{{label}}</span>
                <span class="switch-active" aria-hidden="true">Yes</span>
                <span class="switch-inactive" aria-hidden="true">No</span>
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        name : "switch-field",
        props: [
            'name',
            'model',
            'label',
            'class',
            'size',
        ],
        data() {

            return {
                classStr: this.class || '',
                sizeClass: this.size || 'large',
                attributesStr: this.attributes || ''
            }
        }
    };
</script>

<style scoped>

</style>