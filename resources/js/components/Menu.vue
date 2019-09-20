<template lang="jade">
	<div class="menu">
		<div class="home">
			<span>- Home</span><br>
			<router-link to="/wall">- wall</router-link><br>
			<div v-if="!this.$store.state.userLoggedIn">
				<router-link to="login">- login</router-link><br>
				<router-link to="register">- register</router-link>
			</div>
		</div>

		<div v-if="this.$store.state.userLoggedIn">
			<div class="item" >
				<span>- Item</span><br>
				<router-link to="/item-all">- all</router-link><br>
				<router-link to="/item-create">- create</router-link><br>
			</div>

			<div class="account">
				<span>- Account</span><br>
				<router-link to="/update-password">- update password</router-link><br>
				<router-link to="/logout">- logout</router-link><br>
			</div>
		</div>

	</div>
</template>
