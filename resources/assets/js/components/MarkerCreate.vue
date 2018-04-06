<template>
    <div class="marker-create-container">
        <div id="info-preview">

        </div>
        <form>
            <h3>Create Marker</h3>
            <input v-model="data.title" type="text" placeholder="title"/>
            <input v-model="data.address" type="text" placeholder="address"/>
            <input v-model="data.city" type="text" placeholder="city"/>
            <input v-model="data.zip" type="text" placeholder="zip"/>
            <input type="submit" class="button" v-on:click.prevent="save" value="Save"/>
        </form>
    </div>
</template>

<script>


</script>

<style scoped>

</style>