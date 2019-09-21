<template lang="jade">
	<div class="wall"">
		<b style="text-align: center; color: gray;" v-if="this.$store.state.user.items.total === 0">No items.</b>
		
		<div class="card" v-for="(item, index) in items">
			<div class="card-info">
				<span v-if="false"><img width="50" src="img/loading-inline.gif"></span>
				<span style="color: red; cursor: pointer;" @click="removeItem(item.id, index)">({{ item.id }}) remove</span>
				<span class="date">{{ item.created_at }}</span>
			</div>
			<img v-bind:src="item.image">
			<b class="title"> {{ item.title }}</b>
			<p>  {{ item.description }}</p>
		</div>

		<b style="text-align: center; color: gray;" v-if="this.loading"><img src="img/loading-inline.gif"></b>
		<b style="text-align: center; color: gray;" v-if="this.pagesEnd"> The End.</b>
	</div>
</template>

<script>
	export default {
		data(){
			return{
				loading: false,
				pagesEnd: false,
			}
		},
		mounted() {
			this.loadItems(false);

			const listElm = document.getElementsByTagName("body")[0];
			var body = document.getElementsByTagName("BODY")[0];
			document.addEventListener('scroll', e => {

				let bottomOfWindow = ((window.innerHeight + window.scrollY)) >= document.body.offsetHeight

				if(bottomOfWindow && !this.loading && !this.pagesEnd) 
				{
					this.loading = false
					console.log('body.scrollTop')
					this.loadItems(true);
				}
			});
		},
		methods:{
			loadItems( loadMore = false)
			{
				var current_page = this.$store.state.user.items.current_page;

				if(loadMore){
					this.loading = true
					current_page = current_page + 1
				}

				window.axios.get('/user/item/all?page=' + current_page).then(response => 
				{   
					if(current_page >= this.$store.state.user.items.last_page)
						this.pagesEnd = true

					this.loading = false
					this.$store.commit("UPDATE_USER_ITEMS", response.data)

				}).catch(error => {});
			},
			removeItem(itemId, index)
			{
				window.axios.get('/user/item/remove/' + itemId).then(response => 
				{   
					this.$store.commit("UPDATE_USER_ITEMS", 'remove')
					this.loadItems(false);

				}).catch(error => {});
			}
		},
		computed: {
			items: function() 
			{
				return this.$store.state.user.items.data;
			}
		}
	}
</script>