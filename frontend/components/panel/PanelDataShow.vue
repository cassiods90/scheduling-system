<template>
	<div class="col-12" data-aos="fade-up" data-aos-delay="200">
		<div class="form-row">
			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<span class="text black bold">Name:</span>
					<span class="text black">{{value.name}}</span>
				</div>
			</div> 

			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Email:</label>
					<span class="text black">{{value.email}}</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Password:</label>
					<span class="text black">*********</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.patient != null">
				<div class="d-flex flex-column justify-content-start align-items-start">		
					<label class="text black bold">Confirm Password:</label>
					<span class="text black">*********</span>
				</div>
			</div>  

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.patient != null">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">CPf:</label>
					<span class="text black">{{value.patient.document}}</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.professional != null ">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Register:</label>
					<span class="text black">{{value.professional.document}}</span>
				</div>
			</div> 

			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Phone:</label>
					<span class="text black">{{value.phone}}</span>
				</div>
			</div> 

			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Whatsapp:</label>
					<span class="text black">{{value.whatsapp}}</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Address:</label>
					<span class="text black">{{value.address}}</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Postal Code:</label>
					<span class="text black">{{value.postal_code}}</span>
				</div>
			</div>	

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.professional != null">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Appointment Value:</label>
					<span class="text black">R$ {{value.professional.appointment_value}}</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.professional != null">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Appointment Duration:</label>
					<span class="text black">{{value.professional.appointment_duration}} minutes</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.professional != null">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Opening Hours:</label>
					<span class="text black">{{getOpeningHours.start}} to {{getOpeningHours.break.start}} and {{getOpeningHours.break.end}} to {{getOpeningHours.end}}</span>
				</div>
			</div>

			<div class="form-group col-12 col-md-6 col-lg-4" v-if="value.professional != null">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Open Days:</label>
					<ul class="open-days-text d-flex flex-wrap justify-content-start align-items-start">
						<li v-for="getOpeningDay in getOpeningDays" :key="getOpeningDay" class="d-flex justify-content-center align-items-center">	
							<span class="text black">{{getOpeningDay}}</span>
							<p class="text black">-</p>
						</li>
					</ul>
				</div>
			</div>

			<!-- <div class="form-group col-12 col-md-6 col-lg-4" v-if="value.professional != null">
				<div class="d-flex flex-column justify-content-start align-items-start">
					<label class="text black bold">Appointment Picture:</label>
					<img :src="value.picture.public_url" class="text black">
				</div>
			</div> -->
			
			<div class="form-group col-12">
				<div @click="switchMode" class="field-button">
					<button>Edit Infos</button>
				</div>
			</div>
		</div>
	</div>

</template>

<script>

export default {
    name: 'PanelDataShow',
	props: {
        value: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {

        };
    },
	watch: {
		
	},
	computed: {
		getOpeningHours() {
			var openingHours =  JSON.parse(this.value.professional.opening_hours);
			return openingHours
		},
		getOpeningDays() {
			var openingDays = JSON.parse(this.value.professional.days_open);
			console.log('openingDays', openingDays)
			return openingDays
		}
	},
    methods: {
		switchMode() {
			// console.log('click')
      		this.$emit('switchMode')
    	},
	},
}
</script>