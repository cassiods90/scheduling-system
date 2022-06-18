<template>
    <div>
         <div class="nav-menu footer d-flex flex-column justify-content-center align-items-center">
            <nuxtLink class="text headertext white" to="/">Home</nuxtLink>
            <nuxtLink class="text headertext white" to="/search">Search</nuxtLink>
            <nuxtLink class="text headertext white" to="/about">About</nuxtLink>
            <nuxtLink class="text headertext white" to="/contact">Contact</nuxtLink>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Nav',
}
</script>