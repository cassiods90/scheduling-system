
<template>
    <div class="professional-card-item-modal" :class="{open : showCartModal}">
        <div class="professional-card-item-modal-inner d-flex flex-column flex-lg-row justify-content-start align-items-start">
            <div class="card-item-image">
                <img :src="userPicture" alt="">
            </div>
            <a class="card-item-content d-flex flex-column justify-content-between align-items-center">
                <div class="div-top">
                    <span class="text title base-color item-title">{{value.user.name}}</span>
                </div>

                <div class="div-middle d-flex flex-column justify-content-center align-items-start">
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Registry Number:</span>
                        <span class="text black">{{value.document}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">E-mail:</span>
                        <span class="text black">{{value.user.email}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Phone:</span>
                        <span class="text black">{{value.user.phone}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Whatsapp:</span>
                        <span class="text black">{{value.user.whatsapp}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Address:</span>
                        <span class="text black">{{value.user.address}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Consult Value:</span>
                        <span class="text black">R$ {{value.appointment_value}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Opening Hours:</span>
                        <span class="text black">{{getOpeningHours.start}} to {{getOpeningHours.break.start}} and {{getOpeningHours.break.end}} to {{getOpeningHours.end}}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="text subtitle black">Open Days:</span>
                        <ul class="open-days-text d-flex flex-wrap justify-content-start align-items-start">
                            <li v-for="getOpeningDay in getOpeningDays" :key="getOpeningDay" class="d-flex justify-content-center align-items-center">	
                                <span class="text black">{{getOpeningDay}}</span>
                                <p class="text black">-</p>
                            </li>
					</ul>
                    </div>
                </div>

                <div class="div-bottom">
                    <nuxtLink class="text base-color item-info" :to="`/search/${value.user.id}`"  v-if="$auth.loggedIn">+ Click here to schedule your time</nuxtLink>
                    <nuxtLink class="text base-color item-info" to="/loginRegister" v-else>+ Click here Login</nuxtLink >
                </div>   
            </a>
            <a href="javascript:void(0)" class="modal-close" @click="closeCartModal">
                <img src="@/assets/images/global/close.png" alt=""> 
            </a>
        </div>
    </div>
</template>

<script>


export default {
    name: 'CardItemModal',
    props: {
        showCartModal:{
            required: true,
        },
        value: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            // isLogged: true,
        };
    },
    computed: {
        userPicture() {
            if(!this.value || !this.value.user || !this.value.user.picture || !this.value.user.picture.public_url) return null
            return this.value.user.picture.public_url
        },
        getOpeningHours() {
			var openingHours =  JSON.parse(this.value.opening_hours);
			return openingHours
		},
		getOpeningDays() {
			var openingDays = JSON.parse(this.value.days_open);
			console.log('openingDays', openingDays)
			return openingDays
		}
    },
    methods: {
        toggleCartModal() {
            this.$emit("showCartModal")
        },  
        closeCartModal() {
            this.$emit("closeCartModal")
        },
    },
}
</script>