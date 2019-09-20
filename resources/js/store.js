import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
	state: {
        message: '',
        userLoggedIn: false,
        user: {
        	email: '',
        	items: {},
        },
        wall: {},
    },
    mutations: {
        UPDATE_USER_LOGGIN(state, value) {
            state.userLoggedIn = value
        },
        UPDATE_MESSAGE(state, value) {
            state.message = value
        },
        UPDATE_WALL(state, value) {
            state.wall = value
        },
        UPDATE_USER_ITEMS(state, value) {
            state.user.items = value
        },
    }
});