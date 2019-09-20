<template lang="jade">
	<div class="login-register">
		<form @submit.prevent="submit">
			<div class="errors" v-if="this.$store.state.message != ''">
				<span style="color: green;">- {{ this.$store.state.message }}</span>
			</div>
			<div class="errors" v-if="this.error">
				<span>- {{ error }}</span>
			</div>
			<input type="text" v-model="fields.email" placeholder="Email adress">
			<input type="text" v-model="fields.password" placeholder="Password" autocomplete="on">
			<input type="submit" name="submit" value="Login">
			<span class="divider"></span>
			<span>- <router-link to="/register">register</router-link></span>
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
				},
				error: '',
			}
		},
		methods: {
			submit() {

				this.errors = {};
				window.axios.post('/login', this.fields).then(response => 
				{
					if(response.data.error !== null)
						this.error = response.data.error

					if(response.data.auth == true){
						this.$store.commit("UPDATE_USER_LOGGIN", true);
						this.$router.push('item-all')
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