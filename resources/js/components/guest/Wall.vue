<template lang="jade">
	<div class="wall" id="infinite-wall">
		<b style="text-align: center; color: gray;" v-if="this.$store.state.wall.total === 0">No items.</b>
		<div class="card" v-for="item in items" >
			<div class="card-info">
				<span class="id">{{ item.id }}</span>
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
				var current_page = this.$store.state.wall.current_page;

				if(loadMore){
					this.loading = true
					current_page = current_page + 1
				}

				window.axios.get('/wall?page=' + current_page).then(response => 
				{
					if(current_page >= this.$store.state.wall.last_page)
						this.pagesEnd = true

					this.loading = false
					this.$store.commit("UPDATE_WALL", response.data)

				}).catch(error => {});
			},
		},
		computed: {
			items: function() {
				return this.$store.state.wall.data;
			}
		}
	}
</script>