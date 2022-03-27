import Vue from 'vue';
import Vuex from 'vuex';
import state from './store/state';
import mutations from './store/mutations';
import * as actions from './store/actions';
import * as getters from './store/getters';

Vue.use(Vuex);
Vue.config.productionTip = false;

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters,
});
