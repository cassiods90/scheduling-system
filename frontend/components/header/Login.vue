<template>
    <div>
        <div class="login-register d-flex">
            <nuxtLink class="login-register-item d-flex justify-content-center align-items-center" to="/panel" v-if="$auth.loggedIn">
                <svgIconPanel/> 
                <span class="text headertext white">My Panel, </span>
                <!-- <span class="text headertext white bold" @click="logoutUser()">, Log Out</span>      -->
            </nuxtLink>

            <nuxtLink class="login-register-item d-flex justify-content-center align-items-center" style="width:100%" to="/loginRegister" v-else >
                <svgIconLogin/>               
                <span class="text headertext white">Login / Create Account</span>   
            </nuxtLink>
            
            <span class="logout text headertext white d-flex justify-content-center align-items-center" @click="logoutUser()" v-if="$auth.loggedIn">Log Out</span>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Login',
    data() {
        return {
            // isLogged: false,
        };
    },
    methods: {
        async logoutUser() {
            await this.$auth.logout()
            this.$router.push('/')
            console.log('Logout with sucess!!', this.$auth.loggedIn);
        }
    },
}
</script>