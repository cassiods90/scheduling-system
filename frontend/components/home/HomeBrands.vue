
<template>
    <section class="brands-main">
        <div class="container">
            <h2 class="text title white">Our Partner Brands</h2>
            <VueSlickCarousel  v-bind="slickOptions" class="">
                <div class="brands-main-item" v-for="item in items" >
                    <a href="">
                        <picture>
                            <source media="(max-width: 992px)" :srcset="item.imageTablet">
                            <source media="(max-width: 767px)" :srcset="item.imageMobile">
                            <img :src="item.imageDesktop" alt="">
                        </picture>
                    </a>
                </div>
            </VueSlickCarousel>
        </div>
    </section>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'

export default {
    name: 'HomeBrands',
    components: {
        VueSlickCarousel ,
    },
    data: function () {
        return {
            slickOptions: {
                slidesToShow: 6,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                infinite: true,
                swipeToSlide: true,
                touchMove: true,
                speed: 2000,
                autoplay: true,
                responsive: [
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                           slidesToShow: 3,
                        }
                    },
                ]
            },
            items: [
                {
                    imageDesktop: require('@/assets/images/home/brands/apple.png'),
                    imageTablet:  require('@/assets/images/home/brands/apple.png'),
                    imageMobile:  require('@/assets/images/home/brands/apple.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/google.png'),
                    imageTablet:  require('@/assets/images/home/brands/google.png'),
                    imageMobile:  require('@/assets/images/home/brands/google.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/facebook.png'),
                    imageTablet:  require('@/assets/images/home/brands/facebook.png'),
                    imageMobile:  require('@/assets/images/home/brands/facebook.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/instagram.png'),
                    imageTablet:  require('@/assets/images/home/brands/instagram.png'),
                    imageMobile:  require('@/assets/images/home/brands/instagram.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/linkedin.png'),
                    imageTablet:  require('@/assets/images/home/brands/linkedin.png'),
                    imageMobile:  require('@/assets/images/home/brands/linkedin.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/microsoft.png'),
                    imageTablet:  require('@/assets/images/home/brands/microsoft.png'),
                    imageMobile:  require('@/assets/images/home/brands/microsoft.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/playStore.png'),
                    imageTablet:  require('@/assets/images/home/brands/playStore.png'),
                    imageMobile:  require('@/assets/images/home/brands/playStore.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/twitter.png'),
                    imageTablet:  require('@/assets/images/home/brands/twitter.png'),
                    imageMobile:  require('@/assets/images/home/brands/twitter.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/whats.png'),
                    imageTablet:  require('@/assets/images/home/brands/whats.png'),
                    imageMobile:  require('@/assets/images/home/brands/whats.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/telegram.png'),
                    imageTablet:  require('@/assets/images/home/brands/telegram.png'),
                    imageMobile:  require('@/assets/images/home/brands/telegram.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/twitch.png'),
                    imageTablet:  require('@/assets/images/home/brands/twitch.png'),
                    imageMobile:  require('@/assets/images/home/brands/twitch.png'),
                },
                {
                    imageDesktop: require('@/assets/images/home/brands/linux.png'),
                    imageTablet:  require('@/assets/images/home/brands/linux.png'),
                    imageMobile:  require('@/assets/images/home/brands/linux.png'),
                },
            ]
        }
    },
}
</script>