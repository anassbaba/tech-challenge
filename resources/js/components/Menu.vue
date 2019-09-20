<template lang="jade">
	<div class="menu">
		<div class="home">
			<span>- Home</span><br>
			<router-link to="/wall">
				<span :class="this.$route.path == '/wall' ? 'active' : ''">- wall</span>
			</router-link><br>
			<div v-if="!this.$store.state.userLoggedIn">
				<router-link to="login">
					<span :class="this.$route.path == '/login' ? 'active' : ''">- login</span>
				</router-link><br>
				<router-link to="register">
					<span :class="this.$route.path == '/register' ? 'active' : ''">- register</span>
				</router-link>
			</div>
		</div>

		<div v-if="this.$store.state.userLoggedIn">
			<div class="item" >
				<span>- Item</span><br>
				<router-link to="/item-all">
					<span :class="this.$route.path == '/item-all' ? 'active' : ''">- all</span>
				</router-link><br>
				<router-link to="/item-create">
					<span :class="this.$route.path == '/item-create' ? 'active' : ''">- create</span>
				</router-link><br>
			</div>

			<div class="account">
				<span>- Account</span><br>
				<router-link to="/update-password">
					<span :class="this.$route.path == '/update-password' ? 'active' : ''">- update password</span>
				</router-link><br>
				<router-link to="/logout">
					<span :class="this.$route.path == '/logout' ? 'active' : ''">- logout</span>
				</router-link><br>
			</div>
		</div>

	</div>
</template>
