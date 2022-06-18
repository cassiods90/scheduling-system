
<template>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="javascript:void(0)" class="professional-card-item d-flex flex-column justify-content-start align-items-start" @click="toggleCartModal">
            <div class="card-item-image">
                <img :src="userPicture" alt="">
            </div>
            <div href="javascript:void(0)" class="card-item-content d-flex flex-column justify-content-center">
                <span class="text subtitle base-color item-title">{{value.user.name}}</span>
                <span class="text black">{{value.user.address}}</span>
                <span class="text black">{{value.user.phone}}</span>
                <span class="text base-color item-info">+ More Info</span>
            </div>
            <CardItemModal :showCartModal="showCartModal" @toggleCartModal="toggleCartModal" :value="value"/>
        </a>
    </div>
</template>

<script>
import CardItemModal from '@/components/cards/CardItemModal';

export default {
    name: 'CardItem',
    components: {
        CardItemModal,
    },
    props: {
        value: {
        type: Object,
        required: true,
        },
    },
    data: function () {
        return {
            showCartModal: false,
        }
    },
    watch: {
        
    },
    computed: {
        userPicture() {
            if(!this.value || !this.value.user || !this.value.user.picture || !this.value.user.picture.public_url) return null
            return this.value.user.picture.public_url
        }
    },
    methods: {
        toggleCartModal() {
            this.showCartModal = !this.showCartModal;
        },
        closeCartModal() {
            this.showCartModal = !this.showCartModal;
            console.log('click close')
        },
    },
    beforeCreate() {
        console.log('value array', )
    }
}
</script>