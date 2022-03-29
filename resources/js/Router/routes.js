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
        path: '/scheduler',
        component: require('../Pages/Scheduler').default,
        name: 'scheduler'
    },
    {
        path: '/scheduler/:date',
        component: require('../Pages/ClientList').default,
        name: 'schedulerDate'
    },
    {
        path: '*',
        component: require('../Pages/NotFound').default,
        name: 'not-found'
    }
]

export default routes;
