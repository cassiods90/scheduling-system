<template>
    <div class="user-infos-form" >
		<!-- {{LoggedUserData}} -->
        <div class="row justify-content-center">
            <div class="col-12" data-aos="fade-up" data-aos-delay="200" v-if="editMode">
                <FormulateForm>
                    <div class="form-row">					 
						<div class="form-group col-12" :class="{'col-md-6': form.userType == 'patient'}">
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
									validation="required|min:08"
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
									validation="confirm"
									validation-name="Password confirmation"
									:wrapper-class="['field-input']"
								/>
							</div>
						</div>  

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'patient'">
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

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional' && form.professionalRegister">
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

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
							<div class="field-input-wrapper">
								<label class="text black">Value</label>
								<FormulateInput
									type="number"
									name="professional_appointmentValue"
									:v-model="(parseInt(form.userAppointmentValue))"
									placeholder="Your Appointment Value"
									validation="required|number|between:10,10000"
									min="0"
									max="10000"
									:wrapper-class="['field-input']"
								/>
							</div>
						</div>

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
							<div class="field-input-wrapper">
								<label class="text black">Open Time</label>
								<FormulateInput
									type="time"
									name="professional_openTime"
									v-model="form.opening_hours.start"
									placeholder="Your Open Time"
									validation="required"
									:wrapper-class="['field-input']"
								/>
							</div>
						</div>

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
							<div class="field-input-wrapper">
								<label class="text black">End Time</label>
								<FormulateInput
									type="time"
									name="professional_endTime"
									v-model="form.opening_hours.end"
									placeholder="Your Time End"
									validation="required"
									:wrapper-class="['field-input']"
								/>
							</div>
						</div>

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
							<div class="field-input-wrapper">
								<label class="text black">Break Time Begin</label>
								<FormulateInput
									type="time"
									name="professional_breakTimeBegin"
									v-model="form.opening_hours.break.start"
									placeholder="Your Break Time Begin"
									validation="required"
									:wrapper-class="['field-input']"
								/>
							</div>
						</div>

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
							<div class="field-input-wrapper">
								<label class="text black">Break Time End</label>
								<FormulateInput
									type="time"
									name="professional_breakTimeEnd"
									v-model="form.opening_hours.break.end"
									placeholder="Your Break Time End"
									validation="required"
									:wrapper-class="['field-input']"
								/>
							</div>
						</div>

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
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

							<!-- <div class="field-input-wrapper photo-field" v-if="form.userType == 'professional'">
								<label class="text black">Upload your Picture</label>
								<FormulateInput
									type="image"
									name="professional_picture"
									v-model="form.professionalPicture"
									help="Select a png or jpg to Upload."
									validation="required|mime:image/jpeg,image/png"
									:wrapper-class="['field-input']"
								/>
							</div> -->
						</div>

						<div class="form-group col-12 col-md-6" v-if="form.userType == 'professional'">
							<div class="field-input-wrapper">
								<label class="text black">Open weekdays</label>
								<FormulateInput
									type="checkbox"
									name="professional_openWeekDays"
									v-model="form.professionalOpenWeekDays"
									class="weekdays-input"
									validation="required"
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
									@click="editUser()"
								/>
							</div>
						</div>
                    </div>  
                </FormulateForm>
            </div>

			<PanelDataShow v-if="loggedUserData && !editMode" :value="loggedUserData" @switchMode="switchMode"  :key="`user-data-form-${parseComponentKey}`" />
			
            <!--  <div class="col-12" data-aos="fade-up" data-aos-delay="200" v-else>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <span class="text black bold">Name:</span>
                            <span class="text black">{{LoggedUserData.name}}</span>
                        </div>
                    </div> 

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Email:</label>
                            <span class="text black">{{LoggedUserData.email}}</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Password:</label>
                            <span class="text black">*********</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">		
                            <label class="text black bold">Confirm Password:</label>
                            <span class="text black">*********</span>
                        </div>
                    </div>  

                    <div class="form-group col-12 col-md-6 col-lg-4" v-if="LoggedUserData.professional_id == null">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">CPf:</label>
                            <span class="text black">{{LoggedUserData.patient.document}}</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-else>
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Register:</label>
                            <span class="text black">{{LoggedUserData.professional.document}}</span>
                        </div>
                    </div> 

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Phone:</label>
                            <span class="text black">{{LoggedUserData.phone}}</span>
                        </div>
                    </div> 

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Whatsapp:</label>
                            <span class="text black">{{LoggedUserData.whatsapp}}</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Address:</label>
                            <span class="text black">{{LoggedUserData.address}}</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Postal Code:</label>
                            <span class="text black">{{LoggedUserData.postal_code}}</span>
                        </div>
                    </div>	

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="LoggedUserData.patient_id == null">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Appointment Value:</label>
                            <span class="text black">R$ {{LoggedUserData.professional.appointment_value}}</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="LoggedUserData.patient_id == null">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Appointment Duration:</label>
                            <span class="text black">{{LoggedUserData.professional.appointment_duration}} minutes</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="LoggedUserData.patient_id == null">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Opening Hours:</label>
                            <span class="text black">{{LoggedUserData.professional.opening_hours}}</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="LoggedUserData.patient_id == null">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Open Days:</label>
                            <span class="text black">{{LoggedUserData.professional.days_open}}</span>
                        </div>
                    </div>
                    
                    <div class="form-group col-12">
                        <div @click="switchMode" class="field-button">
                            <button>Edit Infos</button>
                        </div>
                    </div>
                </div>             
            </div> -->
			 
			<!-- <div class="col-12" data-aos="fade-up" data-aos-delay="200" v-else>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <span class="text black bold">Name:</span>
                            <span class="text black">{{form.userName}}</span>
                        </div>
                    </div> 

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Email:</label>
                            <span class="text black">{{form.userEmail}}</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Password:</label>
                            <span class="text black">*********</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">		
                            <label class="text black bold">Confirm Password:</label>
                            <span class="text black">*********</span>
                        </div>
                    </div>  

                    <div class="form-group col-12 col-md-6 col-lg-4" v-if="form.userType == 'patient' ">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">CPf:</label>
                            <span class="text black">{{form.patientCpf}}</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-else>
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Register:</label>
                            <span class="text black">{{form.professionalRegister}}</span>
                        </div>
                    </div> 

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Phone:</label>
                            <span class="text black">{{form.userPhone}}</span>
                        </div>
                    </div> 

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Whatsapp:</label>
                            <span class="text black">{{form.userWhats}}</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Address:</label>
                            <span class="text black">{{form.userAddress}}</span>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Postal Code:</label>
                            <span class="text black">{{form.userPostalCode}}</span>
                        </div>
                    </div>	

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="form.userType == 'professional' ">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Appointment Value:</label>
                            <span class="text black">R$ {{form.userAppointmentValue}}</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="form.userType == 'professional' ">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Opening Hours:</label>
                            <span class="text black">R$ {{form.opening_hours}}</span>
                        </div>
                    </div>

					<div class="form-group col-12 col-md-6 col-lg-4" v-if="form.userType == 'professional' ">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <label class="text black bold">Open Days:</label>
                            <span class="text black">R$ {{form.professionalOpenWeekDays}}</span>
                        </div>
                    </div>
                    
                    <div class="form-group col-12">
                        <div @click="switchMode" class="field-button">
                            <button>Edit Infos</button>
                        </div>
                    </div>
                </div>             
            </div> -->
            
        </div> 
    </div>
</template>

<script>
import { mapState } from "vuex";
import PanelDataShow from '@/components/panel/PanelDataShow';

export default {
    name: 'PanelUserInfos',
	components: {
		PanelDataShow,
	},
    data() {
        return {
			form: null,
            editMode: false,
			loggedUserData: null,
			componentKey: 0,
        };
    },
	watch: {
		// LoggedUserData(newValue) {
		// 	console.log('exec get user data', newValue)
		// 	if(newValue) {
		// 		this.getUserData();
		// 		// this.syncData(newValue);
		// 		// console.log('getUserData', newValue)
		// 	}
		// }
	},
	computed: {
		...mapState({
			LoggedUserData: state => state.auth.user	
		}),
		parseComponentKey() {
			if(this.form && this.form.updated_at) return JSON.stringify(this.form.updated_at);
			return this.componentKey++ 
		},
	},
    methods: {
		forceRerender() {
			this.componentKey++;
			// console.log('re-render', this.componentKey)
		},
		async getUserData() {
			return await this.$axios.get(`/users/get/${this.$auth.user.id}`)
			.then(({data}) => {
				this.loggedUserData = JSON.parse(JSON.stringify(data));
				this.syncData(data);
				console.log('getUserData', data)
			})
		},
		syncData(userData) {
			// console.log('userData syncDataFunction', userData);
			if(!userData) return null;

			var userDataType = null;
			if(userData.patient == null) {
				userDataType = 'professional'
			} else {
				userDataType = 'patient'
			}

			this.form = {
				userType: userDataType,
				userPostalCode:userData.postal_code,
				userName: userData.name,
				userEmail: userData.email,
				userPassword: userData.password,
				patientCpf: (userData.patient ? userData.patient.document : null),
				professionalRegister: (userData.professional ? userData.professional.document : null),
				userPhone: userData.phone,
				userWhats: userData.whatsapp,
				userAddress: userData.address,
				userAppointmentValue: (userData.professional ? parseInt(userData.professional.appointment_value) : null),
				
				opening_hours: {
					start: (userData.professional ? (userData.professional.opening_hours ? userData.professional.opening_hours.start : null) : null),
					end: (userData.professional ? (userData.professional.opening_hours ? userData.professional.opening_hours.end : null) : null),
					break: {
						start: (userData.professional ? (userData.professional.opening_hours ? (userData.professional.opening_hours.break ? userData.professional.opening_hours.break.start : null) : null) : null),
						end: (userData.professional ? (userData.professional.opening_hours ? (userData.professional.opening_hours.break ? userData.professional.opening_hours.break.end : null) : null) : null),
					},
				},
				userAppointmentDuration: (userData.professional ? parseInt(userData.professional.appointment_duration) : null),

				// picture: this.form.professionalPicture,
				picture: userData.picture_uploaded_file_id,
				professionalOpenWeekDays: (userData.professional ? (userData.professional.days_open) : null),
			}
			console.log('UserForm syncDataFunction', this.form);
			setTimeout(()=> {
				this.forceRerender();
			}, 600)
		},
        async switchMode(){
			// await this.getUserData();
			// this.syncData(data);
            this.editMode = !this.editMode;      		
        },
		async editUser() {
			// return console.log('teste editUser')
			try {
				console.log('complete form editUserFunction', this.form)
				let params = {
					_method: "put",
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
						start: this.form.opening_hours.start,
						end: this.form.opening_hours.end,
						break: {
							start: this.form.opening_hours.break.start,
							end: this.form.opening_hours.break.end,
						}
					},
					// picture: this.form.professionalPicture,
					days_open: this.form.professionalOpenWeekDays,
				}
				console.log('complete params editUserFunction', params)
				await this.$axios.post(`users/update/${this.$auth.user.id}`, params)
					.then(response => {
						// console.log('response', response)
						// this.syncData(response.data);
						this.switchMode();
						
					})				
			} 
			catch(e) {
				console.log('error', e)
				alert('Some error was ocurred, please try again.')
			}
		}
    },
	async mounted() {
		await this.getUserData();
	}
}
</script>