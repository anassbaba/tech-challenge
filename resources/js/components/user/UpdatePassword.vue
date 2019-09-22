<template lang="jade">
	<div class="login-register">
		<form @submit.prevent="submit">


			<div  v-if="Object.entries(messages).length !== 0">
				<div class="errors" v-for="error in messages.errors">
					<span >- {{ error }}</span>
				</div>
				<div class="errors" v-for="success in messages.success">
					<span style="color: green; font-size: 10px;">- {{ success }}</span>
				</div>
			</div>


			<input type="password" v-model="fields.old_password" placeholder="Old password" autocomplete="on">
			<input type="password" v-model="fields.new_password" placeholder="New password" autocomplete="on">
			<input type="password" v-model="fields.new_password_confirmation" placeholder="Confirm new wassword" autocomplete="on">
			<input type="submit" name="submit" value="Update">
		</form>
	</div>
</template>


<script>
	export default {

		data() {
			return {
				fields: {
					old_password: '',
					new_password: '',
					new_password_confirmation: '',
				},
				errors: '',
				success: '',
			}
		},
		mounted(){
			this.$store.commit("UPDATE_MESSAGES", {})
		},
		methods: {
			submit() {
				this.errors = {};
				window.axios.post('/user/account/update-password', this.fields).then(response => 
				{
					if(response.data.messages !== undefined)
					{
						console.log(response.data.messages)
						this.$store.commit("UPDATE_MESSAGES", response.data.messages)
					}

				}).catch(error => {
					if (error.response.status === 422) {
						let messages = {}
						messages.errors = []
						for (var key in error.response.data.errors) {
							for (var i = error.response.data.errors[key].length - 1; i >= 0; i--) {
								messages.errors[i] = error.response.data.errors[key][i]
							}
						}

						this.$store.commit("UPDATE_MESSAGES", messages)
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