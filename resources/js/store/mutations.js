import * as TYPES from './mutation-types';

export default {
  [TYPES.SET_FETCHING](state, value) {
    state.fetching[value.field] = value.value;
  },
};
