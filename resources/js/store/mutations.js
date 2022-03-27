import * as TYPES from './mutation-types';

export default {
  [TYPES.SET_LOGIN](state, value) {
    state.login = value;
  },
};
