
<template>
    <div class="professional-schedule-inner d-flex flex-column justify-content-start align-items-center">
        <span class="text title uppercase base-color">Professional schedule</span>
        <span class="text subtitle black">Click on date to see free time</span>
        <ScheduleCalendar />
    </div>
</template>

<script>
import ScheduleCalendar from '@/components/professional/ScheduleCalendar';

export default {
    name: 'ProfessionalSchedule',
    components: {
        ScheduleCalendar,
    },
    props: {
        
    },
    data: function () {
        return {

        }
    },
    watch: {
        
    },
    methods: {
        
    },
    
}
</script>