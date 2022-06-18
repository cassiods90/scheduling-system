
<template>
    <div class="header mobile d-block d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <Logo />
                        
                        <b-navbar-toggle target="nav-collapse" @click="toggleMenuClass()"></b-navbar-toggle>
                        <b-collapse id="nav-collapse" is-nav>
                            <Nav />
                            <Login />
                        </b-collapse>
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
    data: function () {
        return {
            toggleMenu: false,
        }
    },
    methods: {
        toggleMenuClass() {
            this.toggleMenu = !this.toggleMenu
            document.querySelector("body").classList.toggle("show-hide-scrollbar");
        }
    }
}
</script>