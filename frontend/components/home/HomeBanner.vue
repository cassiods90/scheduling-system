
<template>
    <section class="banner-main">
        <VueSlickCarousel  v-bind="slickOptions" class="">
            
            
            <div class="banner-main-item" v-for="item in items" >
                <picture>
                    <source media="(max-width: 992px)" :srcset="item.imageTablet">
                    <source media="(max-width: 767px)" :srcset="item.imageMobile">
                    <img :src="item.imageDesktop" alt="">
                </picture>
                <div class="banner-main-content d-flex justify-content-center align-items-center">
                    <div class="banner-content d-flex flex-column justify-content-center align-items-center">
                        <div class="main-content d-flex flex-column justify-content-center align-items-center">
                            <span class="text title white">{{item.title}}</span>
                            <span class="text subtitle white">{{item.subtitle}}</span>
                        </div>
                    </div>     
                </div>
            </div>

            <!-- <div class="banner-main-item" >
                <picture>
                    <source media="(min-width: 992px)" srcset="@/assets/images/about/banner.jpg">
                    <source media="(min-width: 768px)" srcset="@/assets/images/about/banner.jpg">
                    <img src="@/assets/images/about/banner.jpg" alt="">
                </picture>
                <div class="banner-main-content d-flex justify-content-center align-items-center">
                    <div class="banner-content d-flex flex-column justify-content-center align-items-center">
                        <div class="main-content d-flex flex-column justify-content-center align-items-center">
                            <span class="text bigtitle uppercase white">222We are a healthTech</span>
                            <span class="text subtitle white">222Designed for you, healthcare professional</span>
                        </div>
                    </div>     
                </div>
            </div> -->
            
        </VueSlickCarousel>
    </section>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'

export default {
    name: 'HomeBanner',
    components: {
        VueSlickCarousel ,
    },
    data: function () {
        return {
            slickOptions: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                infinite: true,
                swipeToSlide: true,
                touchMove: true,
                speed: 2000,
                autoplay: true,
            },
            items: [
                {
                    imageDesktop: require('@/assets/images/home/banner01.jpg'),
                    imageTablet: require('@/assets/images/home/banner01.jpg'),
                    imageMobile: require('@/assets/images/home/banner01.jpg'),
                    title: 'Management software for you and your clients',
                    subtitle: 'Take control of your patient management',
                },
                {
                    imageDesktop: require('@/assets/images/home/banner02.jpg'),
                    imageTablet: require('@/assets/images/home/banner02.jpg'),
                    imageMobile: require('@/assets/images/home/banner02.jpg'),
                    title: 'Thinking for you, healthcare professional',
                    subtitle: 'You have access to your clinic and your patients anytime, anywhere.',
                },
                {
                    imageDesktop: require('@/assets/images/home/banner03.jpg'),
                    imageTablet: require('@/assets/images/home/banner03.jpg'),
                    imageMobile: require('@/assets/images/home/banner03.jpg'),
                    title: 'Agile, Efficient and Safe',
                    subtitle: 'Get to know our appointment scheduling system',
                },
            ]
        }
    },
}
</script>