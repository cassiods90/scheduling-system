
<template>
    <div class="home">
        <HomeBanner />
        <HomeContent />
        <HomeBrands />
    </div>
</template>

<script>
import HomeBanner from '@/components/home/HomeBanner';
import HomeContent from '@/components/home/HomeContent';
import HomeBrands from '@/components/home/HomeBrands';

export default {
    name: 'AppAbout',
    components: {
        HomeBanner,
        HomeContent,
        HomeBrands,
    }
}
</script>