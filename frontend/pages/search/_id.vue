<template>
	<div class="pages professional-page d-flex flex-column flex-md-row justify-content-start align-items-start">
		<div class="professional-card">
			<CardItemPage v-if="professionalData" :professional-data="professionalData" />
		</div>
		
		<div class="professional-schedule">
			<ProfessionalSchedule />
		</div>				
	</div>
</template>
<script>
import CardItemPage from '@/components/cards/CardItemPage';
import ProfessionalSchedule from '@/components/professional/ProfessionalSchedule';

	export default {
		name: 'ProfessionalPage',
		components: {
			CardItemPage,
			ProfessionalSchedule,
		},
		props: {
			
		},
		data: function () {
			return {
				professionalData: null,
			}
		},
		methods: {
			async loadProfessional() {
				let id = this.$route.params.id
				let response = await this.getFromAPI(`/professional/${id}`);
				// console.log('response:', response);
				console.log('ProfessionalData:', response);
				this.professionalData = response;
			},
		},
		computed: {

		},
		mounted(){
			this.loadProfessional()
		}

	}
</script>
