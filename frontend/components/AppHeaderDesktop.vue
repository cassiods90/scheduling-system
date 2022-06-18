
<template>
    <div class="header desktop d-none d-lg-block" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <Logo />
                        <Nav />
                        <Login />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import Logo from '@/components/logo/logo';
import Nav from '@/components/header/Nav';
import Login from '@/components/header/Login';
export default {
    name: 'AppHeader',
    components: {
        // Logo,
        Nav,
        Login,
    },
    props: [
        'fixedmenu',
    ],
}
</script>