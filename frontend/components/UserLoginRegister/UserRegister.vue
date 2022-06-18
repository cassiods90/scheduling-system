<template>
	<div class="login-register register-content d-flex flex-column justify-content-center align-items-center" >
		<span class="text subtitle base-color" @click="uploadFile()">Register new account</span>
		<div class="register-links d-flex flex-column justify-content-center align-items-center">
			<FormulateForm class="row" >
				<div class="form-group col-12">
					<div class="field-input-wrapper">
						<label class="text black">Register as a:</label>
						<FormulateInput
							type="select"
							name="user_type"
							:options="{patient: 'Patient', professional: 'Professional'}"
							:wrapper-class="['field-input']"
							v-model="form.userType"
							@change="selectChange"
							/>
					</div>
				</div>  

				<div class="form-group col-12" :class="{'col-md-6': !registerType}">
					<div class="field-input-wrapper">
						<label class="text black">Name</label>
						<FormulateInput
							type="text"
							name="user_name"
							v-model="form.userName"
							validation="required"
							placeholder="Enter Your Name"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div> 

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">
						<label class="text black">Email</label>
						<FormulateInput
							type="email"
							name="user_email"
							v-model="form.userEmail"
							placeholder="Your Email"
							validation="required|email"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">
						<label class="text black">Password</label>
						<FormulateInput
							type="password"
							name="password"
							v-model="form.userPassword"
							placeholder="Enter Your Password"
							validation="required|min:08,length"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">		
						<label class="text black">Confirm Password</label>
						<FormulateInput
							type="password"
							name="password_confirm"
							placeholder="Confirm Your Password"
							validation="required|confirm"
							validation-name="Password confirmation"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>  

				<div class="form-group col-12 col-md-6" v-if="registerType">
					<div class="field-input-wrapper">
						<label class="text black">CPF</label>
						<FormulateInput
							type="text"
							name="patient_cpf"
							v-model="form.patientCpf"
							validation="required"
							placeholder="Enter Your CPF"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div> 

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Register</label>
						<FormulateInput
							type="text"
							name="professional_register"
							v-model="form.professionalRegister"
							validation="required"
							placeholder="Enter Your Professional Register"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div> 

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">
						<label class="text black">Phone</label>
						<FormulateInput
							type="tel"
							name="user_phone"
							v-model="form.userPhone"
							placeholder="Enter Your Phone"
							validation="required"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div> 

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">
						<label class="text black">Whatsapp</label>
						<FormulateInput
							type="tel"
							name="user_whats"
							v-model="form.userWhats"
							placeholder="Enter Your Whatsapp"
							validation="required"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">
						<label class="text black">Address</label>
						<FormulateInput
							type="text"
							name="user_address"
							v-model="form.userAddress"
							validation="required"
							placeholder="Enter Your Address"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6">
					<div class="field-input-wrapper">
						<label class="text black">Postal Code</label>
						<FormulateInput
							type="text"
							name="user_postalCode"
							v-model="form.userPostalCode"
							validation="required"
							placeholder="Enter Your Postal Code"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Value</label>
						<FormulateInput
							type="number"
							name="professional_appointmentValue"
							v-model="form.userAppointmentValue"
							placeholder="Your Appointment Value"
							validation="required|number|between:10,10000"
							min="0"
							max="10000"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Open Time</label>
						<FormulateInput
							type="time"
							name="professional_openTime"
							v-model="form.professionalOpenTime"
							placeholder="Your Open Time"
							validation="required"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">End Time</label>
						<FormulateInput
							type="time"
							name="professional_endTime"
							v-model="form.professionalEndTime"
							placeholder="Your Time End"
							validation="required"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Break Time Begin</label>
						<FormulateInput
							type="time"
							name="professional_breakTimeBegin"
							v-model="form.professionalBreakTimeBegin"
							placeholder="Your Break Time Begin"
							validation="required"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Break Time End</label>
						<FormulateInput
							type="time"
							name="professional_breakTimeEnd"
							v-model="form.professionalBreakTimeEnd"
							placeholder="Your Break Time End"
							validation="required"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>		

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Appointment Time</label>
						<FormulateInput
							type="number"
							name="professional_timeAppointment"
							v-model="form.userAppointmentDuration"
							placeholder="Your Appointment Time"
							validation="required|number|between:0,60"
							min="0"
							max="60"
							:wrapper-class="['field-input']"
						/>
					</div>

					<div class="field-input-wrapper photo-field" v-if="!registerType">
						<label class="text black">Upload your Picture</label>
						<FormulateInput
							type="image"
							name="professional_picture"
							
							upload-behavior="delayed"
							v-model="document"
							help="Select a png or jpg to Upload."
							validation="mime:image/jpeg,image/png"
							:wrapper-class="['field-input']"
						/>
						<!-- <FormulateInput
							type="image"
							name="professional_picture"

							:uploader="uploadFile"
							upload-behavior="delayed"

							help="Select a png or jpg to Upload."
							validation="mime:image/jpeg,image/png"
							:wrapper-class="['field-input']"
						/> -->
					</div>
				</div>

				<div class="form-group col-12 col-md-6" v-if="!registerType">
					<div class="field-input-wrapper">
						<label class="text black">Open weekdays</label>
						<FormulateInput
							type="checkbox"
							name="professional_openWeekDays"
							v-model="form.professionalOpenWeekDays"
							class="weekdays-input"
							:options="{monday: 'Monday', tuesday: 'Tuesday', wednesday: 'Wednesday', thursday: 'Thursday', friday: 'Friday', saturday: 'Saturday', sunday: 'Sunday' }"
							:wrapper-class="['field-input']"
						/>
					</div>
				</div>

				<div class="form-group col-12">
					<div class="field-input-wrapper">
						<FormulateInput
						type="submit"
						name="Save"
						:wrapper-class="['field-button']"
						@click="addUser()"
						/>
					</div>
				</div>
			</FormulateForm>
		</div>
	</div>
</template>


<script>

	export default {
		name: 'UserRegister',
		data() {
			return {
				registerType: true,
				document: false,
				form: {
					userType: null,
					userPostalCode: null,
					userName: null,
					userEmail: null,
					userPassword: null,
					patientCpf: null,
					professionalRegister: null,
					userPhone: null,
					userWhats: null,
					userAddress: null,
					userAppointmentValue: null,
					userAppointmentDuration: null,
					professionalOpenTime: null,
					professionalEndTime: null,
					professionalBreakTimeBegin: null,
					professionalBreakTimeEnd: null,
					professionalTimeAppointment: null,
					professionalPicture: null,
					professionalOpenWeekDays: null,
				}
			};
		},
		methods: {
			selectChange(e) {
				// this.registerType = !this.registerType;
				let elemselect = e.target.value;
				
				if(elemselect == 'professional'){
					console.log('Register professional selected',elemselect )
					this.registerType = false;
				} else {
					console.log('Register patient selected',elemselect )
					this.registerType = true;
				}
			},
			async upload(file, progress, error, options) {
				console.log('upload function file:', file)
				console.log('upload function file:', progress)
				console.log('upload function file:', error)
				console.log('upload function file:', options)
			},
			async uploadFile () {
				console.log('entrou no upload')
				console.log('uploadfile data: ')
				
				console.log('document', this.document)
				if (this.document) {
					try {
						// const path = await this.document.upload()
						//  await this.document.upload(document)
						let UploadImg = this.document.files[0]
						console.log('UploadImg', UploadImg )
						await this.$axios.put('files/upload/temp', UploadImg)
					} catch (err) {
						alert('Error uploading')
						console.error(err)
					}
					// como passar headers pelo axios, no headers tem que ter o campo origin
					// try {
					// 	await this.$axios.put('files/upload/temp', data)
					// } catch {
					// 	console.log('error image upload')
					// }
				}
			},
			async addUser() {
				try {
					// console.log('complete form', this.form)
					let params = {
						user_type: this.form.userType,
						postal_code:this.form.userPostalCode,
						name: this.form.userName,
						email: this.form.userEmail,
						password: this.form.userPassword,
						document: (this.form.userType == "patient" ? this.form.patientCpf : this.form.professionalRegister),
						phone: this.form.userPhone,
						whatsapp: this.form.userWhats,
						address: this.form.userAddress,
						appointment_value: this.form.userAppointmentValue,
						appointment_duration: this.form.userAppointmentDuration,
						opening_hours: {
							start: this.form.professionalOpenTime,
							end: this.form.professionalEndTime,
							break: {
								start: this.form.professionalBreakTimeBegin,
								end: this.form.professionalBreakTimeEnd,
							}
						},
						// picture: this.form.professionalPicture,
						days_open: this.form.professionalOpenWeekDays,
						
					}
					await this.$axios.post("/users/add", params)
						.then(response => {
							console.log('response', response)
							console.log('Complete Form Save', params)
							// this.uploadFile()
							alert('Congratulations !!! Your user was registered with success.')
						})

						
				} 
				catch(e) {
					console.log('error', e)
					alert('Some error was ocurred, please try again.')
				}
			},

		},
	};
</script>