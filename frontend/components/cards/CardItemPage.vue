
<template>
    <div>
        <div class="professional-card-item-page d-flex flex-column justify-content-start align-items-start">
            <div class="card-item-image">
                <img :src="professionalData.user.picture.public_url" alt="">
            </div>
            <div class="card-item-content row flex-wrap justify-content-start align-items-start">
                
                <div class="col-12">
                    <span class="text small title-small base-color item-title-small">{{professionalData.user.name}}</span>
                </div>

                <div class="col-6 col-md-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Registry Number:</span>
                        <span class="text black">{{professionalData.document}}</span>
                    </div>
                </div>

                <div class="col-6 col-md-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Phone:</span>
                        <span class="text black">{{professionalData.user.phone}}</span>
                    </div>
                </div>
                
                <div class="col-6 col-md-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Whatsapp:</span>
                        <span class="text black">{{professionalData.user.whatsapp}}</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">E-mail:</span>
                        <span class="text black">{{professionalData.user.email}}</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Address:</span>
                        <span class="text black">{{professionalData.user.address}}</span>
                    </div>
                </div>

                <div class="col-6 col-md-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Consult:</span>
                        <span class="text black">R$ {{professionalData.appointment_value}}</span>
                    </div>
                </div>

                <div class="col-6 col-md-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Opening Hours:</span>
                        <span class="text black">{{professionalData.opening_hours}}</span>
                    </div>
                </div>

                <div class="col-6 col-md-12">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <span class="text subtitle-small black">Open Days:</span>
                        <span class="text black">{{professionalData.days_open}}</span>
                    </div>
                </div>
            </div>
        </div>          
    </div>
</template>

<script>


export default {
    name: 'CardItemPage',
    components: {
        
    },
    props: {
        professionalData: {
            type: Object,
            default: () => {
                return {}
            }  
        },
    },
    data: function () {
        return {
            
        }
    },
    watch: {
        
    },
    methods: {
        
    },
    beforeCreate() {
        // console.log('teste component', professionalData )
    },
    mounted(){
        console.log('teste component', this.professionalData)
    }
}
</script>