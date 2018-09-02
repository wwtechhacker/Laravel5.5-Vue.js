<template>
    <div class="YoutubeDash-wrapper">
         Videos Dashboard WOrks
    </div>
</template>



<script>

import YTSearch from './Youtube.js';

 export default {
     created() {
         YTSearch({
             apiKey: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
             term: 'ShotsFired Rap Battle League',
             items: 50
         });
     }
 }

</script>