<template lang="jade">
	<div class="wall">
		<b style="text-align: center; color: gray;" v-if="this.$store.state.user.items.total === 0">No items.</b>
		
		<div class="card" v-for="item in this.$store.state.user.items.data">
			<div class="card-info">
				<span style="color: red">remove</span>
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
		mounted() {
			window.axios.get('/user/item/all').then(response => 
			{
				this.$store.commit("UPDATE_USER_ITEMS", response.data);
			});
		},
	}
</script>