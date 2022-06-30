
<template>
	<div class="schedule-calendar d-flex flex-column justify-content-center align-items-center">
		
		<v-date-picker
		@dayclick="onDayClick"
		mode="dateTime"
		v-model="date"
		class="custom-calendar"
		:min-date="new Date()"
		:valid-hours="[8, 9, 10, 11, 13, 14, 15, 16, 17]"
		:minute-increment="15"
		is24hr
		/>

		<div class="field-button">
			<button>Save</button>
		</div>

		<!--
		<div class="form-group col-12">
			<div class="field-input-wrapper">
				<FormulateInput
				type="submit"
				name="save"
				:wrapper-class="['field-button']"
				/>
			</div>
			:min-date="new Date()"
		</div>    -->

	</div>
</template>


<script>
	export default {
		name: "ScheduleCalendar",
		components: {

		},
		props: {

		},
		data() {
			return {
				date: null,
			};
		},
		watch: {

		},
		computed: {

		},
		methods: {
			onDayClick(day) {
				console.log("DayCLick", day);
				
				var allElements = document.querySelectorAll(".vc-day");				
				allElements.forEach(function(element, i) {
					// console.log('for each element', element)
					element.classList.remove('active')
				})

				var dayClass = `.id-${day.id}`;
				var element = document.querySelector(dayClass); //id-2022-05-24
				element.classList.add("active")
				// console.log("element", element);
			},
		},
	};
</script>




