
<template>
    <section class="cards-items">
        <div class="container">
            <span class="text title black">Professionals:</span>
            <div class="professional-cards-items row flex-wrap justify-content-start align-items-center">
                <CardItem v-for="(professionalItem) in professionalItems" :key="`professional-item-${professionalItem.id}`"  :value="professionalItem"/>
            </div>
        </div>
    </section>
</template>

<script>
import CardItem from '@/components/cards/CardItem';

export default {
    name: 'AppCardsItems',
    components: {
        CardItem,
    },
    props: {
        professionalItems: {
            type: Array,
            default: () => {
                return []
            }  
        },
    },
    data: function () {
        return {

        }
    },
}
</script>