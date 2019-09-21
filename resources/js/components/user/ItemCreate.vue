<template lang="jade">
	<div class="wall card-container">
		<div class="card">
			<form @submit.prevent="submit">
				<div class="errors" v-if="this.errors">
					<span v-for="error in this.errors" >- {{ error }}</span>
				</div>

				<input id="file" type="file" name="fields.image"  placeholder="Upload image">
				<input type="text" v-model="fields.title" placeholder="Item title">
				<textarea v-model="fields.description" rows="10" cols="30" placeholder="Item Description"></textarea>
				<input type="submit" name="create" value="Create">
			</form>
		</div>
	</div>
</template>
<script>
	export default {

		data() {
			return {
				fields: {
					image: '',
					title: '',
					description: '',
				},
				errors: '',
			}
		},
		methods: {
			submit() {
				var formData = new FormData();

				this.errors = {};

				formData.append('image', document.querySelector('#file').files[0]);
				formData.append('title', this.fields.title);
				formData.append('description', this.fields.description);
				
				window.axios.post('/user/item/create', formData, { headers: { 'Content-Type': 'multipart/form-data' } }).then(response => 
				{
					if(response.data.error != null)
						this.errors = response.data.error

					if(response.data.success != null){
						this.$store.commit("UPDATE_MESSAGE", response.data.success)
						this.$router.push('/item-all')
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