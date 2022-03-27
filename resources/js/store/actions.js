import * as TYPES from './mutation-types';

export const setLogin = ({ commit }, params) => {
  commit(TYPES.SET_LOGIN, params);
}
