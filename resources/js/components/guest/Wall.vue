<template lang="jade">
	<div class="wall">
			<div class="card" v-for="item in this.$store.state.wall.data">
				<div class="card-info">
					<span class="date">{{ item.created_at }}</span>
				</div>
				<img v-bind:src="item.image">
				<b class="title"> {{ item.title }}</b>
				<p>  {{ item.description }}</p>
			</div>
	</div>
</template>

<script>
	export default {
		created() {
			window.axios.get('/user/item/all').then(response => 
			{
				console.log(response)
				this.$store.commit("UPDATE_USER_ITEMS", response.data)

			}).catch(error => {
				if (error.response.status === 422) {
					this.errors = error.response.data.errors || {};
				}
			});
		},
	}
</script>