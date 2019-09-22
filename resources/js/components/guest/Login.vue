<template lang="jade">
	<div class="login-register">
		<form @submit.prevent="submit">

			<div  v-if="messages.length !== 0">
				<div class="errors" v-for="error in messages.errors">
					<span >- {{ error }}</span>
				</div>
				<div class="errors" v-for="success in messages.success">
					<span style="color: green; font-size: 10px;">- {{ success }}</span>
				</div>
			</div>

			<input type="text" v-model="fields.email" placeholder="Email adress">
			<input type="password" v-model="fields.password" placeholder="Password" autocomplete="on">
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
			}
		},
		mounted(){
			this.$store.commit("UPDATE_MESSAGES", [])
		},
		methods: {
			submit() {
				window.axios.post('/login', this.fields).then(response => 
				{ 
					if(response.data.messages !== undefined)
					{
						this.$store.commit("UPDATE_MESSAGES", response.data.messages)

						if(response.data.messages.success.length > 0){
							this.$store.commit("UPDATE_MESSAGES", [])
							this.$store.commit("UPDATE_USER_LOGGIN", true)
							this.$router.push('item-all')
						}
					}

				}).catch(error => {

					if (error.response.status === 422) {
						this.errors = error.response.data.errors || {};
					}
				});
			},
		},
		computed:{
			messages()
			{
				return this.$store.state.messages;
			}
		}
	}
</script>