import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        headers: {},
        data: {}
    },
    getters: {
        getHeaders: state => state.headers,
        getData: state => state.data
    },
    mutations: {
        SET_DATA(state, data) {
            state.data = data
        },
        SET_HEADERS(state, headers) {
            state.headers = headers
        }
    },
    actions: {
        getContent({commit}) {
            window.axios.get('/api/data').then(res => {
                commit('SET_DATA', res.data.data)
                commit('SET_HEADERS', {
                    companies: res.data.companies
                })
            })
        }
    }
})

export default store
