<template>
<<<<<<< HEAD
    <carousel v-bind="carousel" ref="carouselRef">
        <slide v-bind:class="{'selected': activeSlide === 1}">
            <div><img src="http://via.placeholder.com/618x390" alt=""></div>
            Slide 1 Content
        </slide>
        <slide v-bind:class="{'selected': activeSlide === 2}">
            <div><img src="http://via.placeholder.com/618x390" alt=""></div>
            Slide 2 Content
        </slide>
        <slide v-bind:class="{'selected': activeSlide === 3}">
            <div><img src="http://via.placeholder.com/618x390" alt=""></div>
            Slide 3 Content
        </slide>
        <slide v-bind:class="{'selected': activeSlide === 4}">
            <div>
                <img src="http://via.placeholder.com/618x390" alt="">
            </div>
            Slide 4 Content
        </slide>
    </carousel>
</template>

<script>
    import {Carousel, Slide} from 'vue-carousel';
=======
    <div class="character-box"
         :class="[{ 'active': character.active }]" @click="setActive(character.id)">
      <img class="character-img" :src="character.smallImg" />
      <p class="character-name">{{character.name}}</p>
    </div>
</template>

<script>
>>>>>>> develop

    var vue;

    export default {
<<<<<<< HEAD
        extends   : Carousel,
        components: {
            Carousel,
            Slide
=======
        extends   : ,
        components: {
            
>>>>>>> develop
        },
        data() {
            vue = this;
            return {
<<<<<<< HEAD
                carousel   : {
                    perPage            : 1,
                    paginationEnabled  : false,
                    navigationEnabled  : true,
                    navigationNextLabel: '<i class="fa fa-arrow-right" aria-hidden="true"></i><span class="sr-only">Arrow Right</span>',
                    navigationPrevLabel: '<i class="fa fa-arrow-left" aria-hidden="true"></i><span class="sr-only">Arrow Left</span>',
                    paginationPadding  : 5,
                    minSwipeDistance   : 8
                },
                activeSlide: 1
            };
        },
        mounted() {
            var carouselRef = vue.$refs.carouselRef;
            // vue.activeSlide = 2;
            // carouselRef.goToPage(1);
            vue.$refs.carouselRef.$on('pageChange', function (page) {
                console.log(vue.activeSlide);
                vue.activeSlide = page + 1;
            });
=======
            
            };
        },
        mounted() {
            
>>>>>>> develop
        }
    };
</script>

<style scoped>

</style>