const routes = [
    {
        path: '/form',
        component: require('../Pages/Form').default,
        'name': 'new-form'
    },
    {
        path: '/not-found',
        component: require('../Pages/NotFound').default,
        name: '404'
    },
    {
        path: '*',
        component: require('../Pages/NotFound').default,
        name: 'not-found'
    }
]

export default routes;
