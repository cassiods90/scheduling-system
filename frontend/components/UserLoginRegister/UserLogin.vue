<template>
	<div class="login-register login-content d-flex flex-column justify-content-center align-items-center">
		<span class="text subtitle base-color">Execute Login</span>
		<div class="login-links d-flex flex-column justify-content-center align-items-center">
			<FormulateForm>
				<div class="form-row">
					<div class="form-group col-12">
						<div class="field-input-wrapper">
							<label class="text black">Email</label>
							<FormulateInput
								type="text"
								v-model="userEmail"
								validation="required"
								placeholder="Enter your e-mail"
								:wrapper-class="['field-input']"
							/>
						</div>
					</div>

					<div class="form-group col-12">
						<div class="field-input-wrapper">
							<label class="text black">Password</label>
							<FormulateInput
								type="password"
								v-model="userPassword"
								validation="required"
								placeholder="Enter your password"
								:wrapper-class="['field-input']"
							/>
						</div>
					</div>   

					<div class="form-group col-12">
						<div class="field-input-wrapper">
							<FormulateInput
							type="submit"
							name="Login"
							:wrapper-class="['field-button']"
							@click="loginUser()"
							/>
						</div>
					</div>   		
				</div>
			</FormulateForm>
		</div>	
	</div>
</template>


<script>
	export default {
		name: 'UserLogin',
		data() {
			return {
				userPassword: null,
				userEmail: null,
			};
		},
		methods: {
			async loginUser() {
				console.log(this.userPassword, this.userEmail)
				// console.log('antes de entrar no login', this.$auth.loggedIn)
				try {
					let succesfulLogin  = await this.$auth.loginWith('local', {
						data: {
							email: this.userEmail,
							password: this.userPassword,
						},
					});
					// this.$store.commit('SET_USER_TOKEN', response.data);

					if (succesfulLogin) {
						await this.$auth.setUser({
							email: this.userEmail,
							password: this.userPassword,
						})
					}

					// console.log('succesfulLogin', succesfulLogin.data);
					console.log('Login with sucess!!', this.$auth.loggedIn);
					this.$router.push('/panel')
				} catch(error) {
					console.log('Login Error', error);
					alert('Some error was ocurred, please try again.')
					// this.$router.push('/loginRegister')
				}

      			return false;
			}
		},
		components: {
			
		}
	};
</script>