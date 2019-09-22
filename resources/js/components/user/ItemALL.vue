<template lang="jade">
	<div class="wall"">
		<b style="text-align: center; color: gray;" v-if="this.$store.state.user.items.data == undefined || this.$store.state.user.items.total == 0">You have no items.</b>
		
		<div class="card" v-for="(item, index) in items">
			<div class="card-info">
				<span v-if="false"><img width="50" src="img/loading-inline.gif"></span>
				<span style="color: red; cursor: pointer;" @click="removeItem(item.id, index)">(id: {{ item.id }}) remove</span>
				<span class="date">{{ item.created_at }}</span>
			</div>
			<img v-bind:src="item.image">
			<b class="title"> {{ item.title }}</b>
			<p>  {{ item.description }}</p>
		</div>

		<b style="text-align: center; color: gray;" v-if="this.loading"><img src="img/loading-inline.gif"></b>
		<b style="text-align: center; color: gray;" v-if="this.pagesEnd && this.$store.state.user.items.total > 0"> The End.</b>
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

				if(bottomOfWindow && !this.loading && !this.pagesEnd && this.$route.path == '/item-all') 
				{
					this.loading = false
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

				window.axios.get('/user/item/all/json?page=' + current_page).then(response => 
				{   
					if(current_page >= this.$store.state.user.items.last_page)
						this.pagesEnd = true

					this.loading = false
					this.$store.commit("UPDATE_USER_ITEMS", response.data.items)

				}).catch(error => {});
			},
			removeItem(itemId, index)
			{
				window.axios.get('/user/item/remove/' + itemId).then(response => 
				{   
					this.$store.commit("UPDATE_USER_ITEMS", index)
					
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