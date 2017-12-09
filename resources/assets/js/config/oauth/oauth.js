const state = {
	oauth: {},
}

const getters = {
	oauth: state => state.oauth
}

const mutations = {
	SET_OAUTH(state){
		let _oauth = localStorage.getItem('oauth')
        state.oauth = JSON.parse(_oauth)
    }
}

const actions = {
	setOauth({commit}){
		commit('SET_OAUTH')
	}
}

export default {
	state,
	getters,
	mutations,
	actions
}