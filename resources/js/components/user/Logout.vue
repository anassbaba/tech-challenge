<template lang="jade">
	<div class="logout"></div>
</template>

<script>
	export default {
		mounted() {
			window.axios.get('/dynamic/logout').then(response => 
			{
				this.$router.push('login')

			}).catch(error => {
				if (error.response.status === 422) {
					this.errors = error.response.data.errors || {};
				}
			});
		},
	}
</script>