const state = {
	calon: [],
	kriteria: []
}

const mutations = {
	SET_CALON (state, payload) {
		state.calon = payload
	},
	SET_KRITERIA (state, payload) {
		state.kriteria = payload
	}
}

const actions = {
	setCalon (context, res) {
		context.commit('SET_CALON', res)
	},
	setKriteria (context, res) {
		context.commit('SET_KRITERIA', res)
	}
}

const getters = {
	calon: state => {
		return state.calon
	},
	kriteria: state => {
		return state.kriteria
	},
	nilaiCalon: state => (id, idx) => {
		let un = state.calon[idx].kriterias.find(c => c.kriteria_id == id)
		if (typeof un == 'undefined') {
			return 0
		}else{
			return un.nilai//.find(c => c.kriteria_id === id)
		}
		
	}
}
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store ({
	state,
	mutations,
	actions,
	getters
})