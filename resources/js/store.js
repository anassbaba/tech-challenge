import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
	state: {
        message: '',
        userLoggedIn: false,
        user: {
            email: '',
        	itemRemoving: false,
        	items: {
                data: [],
                total: 0,
                last_page: 1000000000000,
                current_page: 0
            },
        },
        wall: {
            data: [],
            total: 0,
            last_page: 1000000000000,
            current_page: 0
        },
    },
    mutations: {
        UPDATE_USER_LOGGIN(state, value) {
            state.userLoggedIn = value
        },
        UPDATE_MESSAGE(state, value) {
            state.message = value
        },
        UPDATE_WALL(state, value) {
            if(state.wall.data.length == 0){
                state.wall = value
            }
            else{
                for (var i = value.data.length - 1; i >= 0; i--) {
                    state.wall.data.push(value.data[i])
                }
            }

            state.wall.total        = value.total; 
            state.wall.last_page        = value.last_page; 
            state.wall.current_page = value.current_page; 
        },
        UPDATE_USER_ITEMS(state, value) {
            if(value == 'remove'){
                state.user.items.data = []
                return;
            }

            if(state.user.items.data.length == 0){
                state.user.items = value
            }
            else{
                for (var i = value.data.length - 1; i >= 0; i--) {
                    state.user.items.data.push(value.data[i])
                }
            }

            state.user.items.total        = value.total; 
            state.user.items.last_page        = value.last_page; 
            state.user.items.current_page = value.current_page; 
        },
    }
});