
<template>
    <div class="scheduls-item" :class="{oldDate: value.oldDate}">
        <div class="scheduls-item-content flex-wrap d-flex justify-content-between align-items-center">
            <!-- <div class="col-1">
                <div class="schedul-item d-flex flex-column justify-content-start align-items-start">
                    <span class="text black item-title">ID:</span>
                    <span class="text black">{{value.id}}</span>
                </div>
            </div> -->
            
            <div class="col-12 col-md-7" v-if="userType == 'professional'">
                <div class="schedul-item d-flex flex-column justify-content-start align-items-start">
                    <span class="text black item-title">Patient:</span>
                    <span class="text black">{{value.patient.name}}</span>
                </div>
            </div>

            <div class="col-12 col-md-7" v-else>
                <div class="schedul-item d-flex flex-column justify-content-start align-items-start">
                    <span class="text black item-title">Professional:</span>
                    <span class="text black">{{value.professional.name}}</span>
                </div>
            </div>

            <div class="col-8 col-md-3">
                <div class="schedul-item d-flex flex-column justify-content-start align-items-start">
                    <span class="text black item-title">Date:</span>
                    <span class="text black">{{value.schedule_datetime}}</span>
                </div>
            </div>

            <!-- <div class="col-4 col-md-1">
                <div class="schedul-item d-flex flex-column justify-content-start align-items-start">
                    <span class="text black item-title">Hour:</span>
                    <span class="text black">{{value.scheduleTime}}</span>
                </div>
            </div> -->

            <div class="col-2">
                <div class="schedul-item item-icon d-flex flex-column justify-content-center align-items-center" @click="removeItem($event)">
                    <div class="schedul-item-icon">
                        <svgIconDelete/>
                    </div>
                    <span class="text black">Cancel</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PanelScheduls',
    components: {

    },
    props: {
        value: {
            type: Object,
            required: true,
        },
        userType: {
            type: String,
            required: true,
        },
    },
    data: function () {
      return {
        visible: true,
      }
    },
    methods: {
        removeItem(event) {
            let elem = event.target.closest(".scheduls-item");

            if(elem.classList.contains('oldDate')){
                alert("can't delete an old schedule")

            } else {
                elem.remove(); 

                // console.log('delete id: ', this.value.id )
                this.$axios.delete(`/schedules/${this.value.id}`)
            }            
        }
    },
}
</script>