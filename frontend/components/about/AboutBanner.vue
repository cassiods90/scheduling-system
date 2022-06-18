
<template>
    <section class="banner-main">
        <div class="banner-main-item" >
            <picture>
                <source media="(min-width: 992px)" srcset="@/assets/images/about/banner.jpg">
                <source media="(min-width: 768px)" srcset="@/assets/images/about/banner.jpg">
                <img src="@/assets/images/about/banner.jpg" alt="">
            </picture>
            <div class="banner-main-content d-flex justify-content-center align-items-center">
                <div class="banner-content d-flex flex-column justify-content-center align-items-center">
                    <div class="main-content d-flex flex-column justify-content-center align-items-center">
                        <span class="text bigtitle uppercase white">We are a healthTech</span>
                        <span class="text subtitle white">Designed for you, healthcare professional</span>
                    </div>
                </div>     
            </div>
        </div>
    </section>
</template>

<script>


export default {
    name: 'AboutBanner',
    components: {

    }
}
</script>