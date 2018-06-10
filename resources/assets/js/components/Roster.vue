<template>
    <div class="character-box"
         :class="[{ 'active': character.active }]" @click="setActive(character.id)">
      <img class="character-img" :src="character.smallImg" />
      <p class="character-name">{{character.name}}</p>
    </div>
</template>

<script>

    var vue;

    export default {
        extends   : ,
        components: {
            
        },
        data() {
            vue = this;
            return {
            
            };
        },
        mounted() {
            
        }
    };
</script>

<style scoped>

</style>