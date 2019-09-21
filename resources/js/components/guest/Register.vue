<template lang="jade">
	<div class="login-register">
		<form @submit.prevent="submit">
			<div class="errors" v-if="Object.entries(this.errors).length !== 0">
				<span v-for="fields in this.errors" >
					<span v-for="field in fields">- {{ field }}</span>
				</span>
			</div>
			<input type="text" v-model="fields.email" placeholder="Email adress">
			<input type="password" v-model="fields.password" placeholder="Password" autocomplete="on">
			<input type="password" v-model="fields.password_confirmation" placeholder="Password confirmation" autocomplete="on">
			<input type="submit" name="submit" value="Register">
			<span class="divider"></span>
			<span>- Already member: <router-link to="/login">- login</router-link><br></span>
		</form>
	</div>
</template>

<script>
	export default {

		data() {
			return {
				fields: {
					email: '',
					password: '',
					password_confirmation: '',
				},
				errors: {},
			}
		},
		methods: {
			submit() {

				this.errors = {};
				window.axios.post('/register/new', this.fields).then(response => 
				{   
					console.log(response.data)
					if(response.data.error != null)
						this.error = response.data.error
					if(response.data.success != null){
						this.$store.commit("UPDATE_MESSAGE", response.data.success)
						this.$router.push('/login')
					}

				}).catch(error => {
					if (error.response.status === 422) {
						this.errors = error.response.data.errors || {};
					}
				});
			},
		},
	}
</script>