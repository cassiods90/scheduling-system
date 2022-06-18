
<template>
    <div class="panel">
        <div class="panel-content">
            <div class="container">
                <div class="col-12">
                    <div class="panel-item" data-id="0" >
                        <div class="panel-item-menu d-flex justify-content-between align-items-center" @click="toggleView($event)">
                            <span class="text subtitle black">My Schedules </span> 
                            <span class="open-icons">
                                <img class="less" src="@/assets/images/panel/minus.png">
                                <img class="more" src="@/assets/images/panel/plus.png">
                            </span>
                        </div>

                        <div class="panel-content-item scheduls-items">
                            <PanelScheduls v-for="(schedul) in mySchedul" :key="`mySchedul-item-${schedul.id}`"  :value="schedul"/>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="panel-item" data-id="1" >
                        <div class="panel-item-menu d-flex justify-content-between align-items-center" @click="toggleView($event)">
                            <span class="text subtitle black">Edit my infos</span>
                            <span class="open-icons">
                                <img class="less" src="@/assets/images/panel/minus.png">
                                <img class="more" src="@/assets/images/panel/plus.png">
                            </span>
                            
                        </div>

                        <div class="panel-content-item user-infos" >
                            <PanelUserInfos />
                        </div>
                    </div>
                </div>

            </div>
        
            
        </div>
    </div>
</template>

<script>
import PanelScheduls from '@/components/panel/PanelScheduls.vue';

export default {
    name: 'AppPanel',
    components: {
        PanelScheduls,
    },
    props: {
        mySchedul: {
            type: Array,
            default: () => {
                return []
            }  
        },
    },
    data: function () {
      return {
        visible: true,
      }
    },
    watch: {
    
    },
    methods: {
      toggleView(event) {
        let elem = event.target.closest(".panel-item");
        let elemOthers = document.querySelectorAll('.panel-item')
        if(elem.classList.contains('visible')){
            elem.classList.remove('visible')
        } else {
            elem.classList.add('visible')
        }
        elemOthers.forEach((node) => {
            if(node != elem) {
                node.classList.remove('visible')
            }
        })
      }
    },
    mounted() {

    },
}
</script>