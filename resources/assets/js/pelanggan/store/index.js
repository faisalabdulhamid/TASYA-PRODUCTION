import Vue from 'vue'
import Vuex from 'vuex'
import plugin from './plugins'
import oauth from '../../config/oauth/oauth'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules:{
    	plugin: plugin,
    	oauth: oauth,
    },
    strict: debug
})