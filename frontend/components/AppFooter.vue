
<template>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <Logo />
                </div>
                <div class="col-12 col-md-4">
                    <NavFooter />
                </div>
                <div class="col-12 col-md-4">
                    <SocialMedia />
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
// import Logo from '@/components/logo/logo';
import NavFooter from '@/components/footer/NavFooter';
import SocialMedia from '@/components/footer/SocialMedia';
export default {
    name: 'AppHeader',
    components: {
        // Logo,
        NavFooter,
        SocialMedia,
    }
}
</script>