<template>
	<div  class="pages login-register-page">
		<div class="container">
			<div class="login-register-content d-flex flex-column flex-md-row justify-content-start align-items-start">
				<div class="col-12 col-md-5 col-lg-4">
					<UserLogin />
				</div>
				<div class="col-12 col-md-7 col-lg-8">
					<UserRegister />
				</div>
			</div>
		</div>
	</div>
</template>


<script>
// import UserLogin from '@/components/UserloginRegister/UserLogin';
// import UserRegister from '@/components/UserloginRegister/UserRegister';

	export default {
		name: 'loginRegister',
		components: {
			// UserLogin,
			// UserRegister,
		},
		data() {
			return {
				
			};
		},
		methods: {
			
		},
		components: {
			
		}
	};
</script>