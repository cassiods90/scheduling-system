<template>
	<div  class="pages panel-page">
		<AppPanel :mySchedul="mySchedules"/>
	</div>
</template>


<script>
import AppPanel from '@/components/AppPanel';

	export default {
		name: 'panel',
		components: {
			AppPanel,
		},
		data: function () {
			return {
				mySchedules: [
					{
						id: 1,
						professionalName: "Professional Name 04",
						scheduleDate: "17/08/2022",
						scheduleTime: "11:00",
						oldDate: false,
					},
					{
						id: 2,
						professionalName: "Professional Name 02",
						scheduleDate: "15/07/2022",
						scheduleTime: "12:00",
						oldDate: false,
					},
					{
						id: 3,
						professionalName: "Professional Name 03",
						scheduleDate: "10/06/2022",
						scheduleTime: "15:00",
						oldDate: true,
					},
					{
						id: 4,
						professionalName: "Professional Name 02",
						scheduleDate: "01/01/2022",
						scheduleTime: "13:00",
						oldDate: true,
					},
					{
						id: 5,
						professionalName: "Professional Name 01",
						scheduleDate: "15/07/2022",
						scheduleTime: "17:00",
						oldDate: true,
					},
					{
						id: 6,
						professionalName: "Professional Name 04",
						scheduleDate: "10/06/2022",
						scheduleTime: "9:00",
						oldDate: true,
					},
					{
						id: 7,
						professionalName: "Professional Name 04",
						scheduleDate: "01/01/2022",
						scheduleTime: "18:00",
						oldDate: true,
					},
				],
			};
		},
		methods: {

		},
	};
</script>