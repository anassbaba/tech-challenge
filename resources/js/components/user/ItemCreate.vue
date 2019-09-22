<template lang="jade">
	<div class="wall card-container">
		<div  v-if="messages.length !== 0">
			<div class="errors" v-for="error in messages.errors">
				<span >- {{ error }}</span>
			</div>
			<div class="errors" v-for="success in messages.success">
				<span style="color: green; font-size: 10px;">- {{ success }}</span>
			</div>
		</div>
		<div class="card">
			<form @submit.prevent="submit">
				<div class="errors" v-if="Object.entries(this.errors).length !== 0">
					<span v-for="fields in this.errors" >
						<span v-for="field in fields">- {{ field }}</span>
					</span>
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
		mounted(){
			this.$store.commit("UPDATE_MESSAGES", [])
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
					if(response.data.messages !== undefined){
						if(response.data.messages.success.length > 0){
							this.$store.commit("UPDATE_MESSAGES", response.data.messages)
							this.$router.push('/item-all')
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