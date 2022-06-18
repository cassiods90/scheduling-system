
<template>
    <div>
        <AppHeaderMobile />
        <AppHeaderDesktop />
    </div>          
</template>

<script>
import AppHeaderMobile from '@/components/AppHeaderMobile';
import AppHeaderDesktop from '@/components/AppHeaderDesktop';
export default {
    name: 'AppHeader',
    components: {
        AppHeaderMobile,
        AppHeaderDesktop,
    }
}
</script>