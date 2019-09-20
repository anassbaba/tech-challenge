<template lang="jade">
	<div class="wall">
		<b style="text-align: center; color: gray;" v-if="this.$store.state.wall.total === 0">No items.</b>
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
		beforeCreate() {
			window.axios.get('/wall').then(response => 
			{
				console.log(response)
				console.log(response)
				this.$store.commit("UPDATE_WALL", response.data)
				this.$store.commit("UPDATE_WALL", response.data)

			}).catch(error => {
				if (error.response.status === 422) {
					this.errors = error.response.data.errors || {};
				}
			});
		},
	}
</script>