<template lang="jade">
	<div class="login-register">
		<form @submit.prevent="submit">

			<div class="errors" v-if="this.errors">
				<span v-for="error in this.errors" >- {{ error }}</span>
			</div>

			<div class="errors" v-if="this.success">
				<span style="color: green">- {{ this.success }}</span>
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
		methods: {
			submit() {
				this.errors = {};
				window.axios.post('/user/account/update-password', this.fields).then(response => 
				{
					if(response.data.error !== null){
						this.errors = response.data.error
					}

					if(response.data.success !== null){
						this.success = response.data.success
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