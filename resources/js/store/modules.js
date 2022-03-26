const context = require.context('./modules', true, /^[^_]((?!\/_).)*\.js$/);

let cache = [];

export default Object.fromEntries(context.keys()
  .map(pathToFile => {
    let parsed = pathToFile.split('/').slice(1, pathToFile.split('/').length - 1);
    return {
      path: `./${parsed.join('/')}`,
      moduleName: parsed.map(word => word[0].toUpperCase() + word.substr(1)).join('')
    };
  })
  .filter(({ moduleName }) => {
    if (cache.indexOf(moduleName) > -1) {
      return false;
    } else {
      cache.push(moduleName);
      return true;
    }
  })
  .map(({ path, moduleName }) => {
    let state = {};
    let actions = {};
    let getters = {};
    let mutations = {};

    try {
      actions = context(`${path}/actions.js`);
    } catch(e) {
    }

    try {
      getters = context(`${path}/getters.js`);
    } catch(e) {
    }

    try {
      mutations = context(`${path}/mutations.js`).default;
    } catch(e) {
    }

    try {
      state = context(`${path}/state.js`).default;
    } catch(e) {
    }

    return [
      moduleName,
      {
        namespaced: true,
        actions,
        getters,
        mutations: context(`${path}/mutations.js`).default,
        state: context(`${path}/state.js`).default,
      }
    ];
  })
);
