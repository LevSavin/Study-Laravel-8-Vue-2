const routes = [
    {
        path: '/main',
        component: require('../Pages/MainTable').default,
        'name': 'main-table'
    },
    {
        path: '/main/:date',
        component: require('../Pages/MainTable').default,
        'name': 'main-table'
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
    // {
    //     path: '/scheduler/:date',
    //     component: require('../Pages/ClientList').default,
    //     name: 'schedulerDate'
    // },
    {
        path: '*',
        component: require('../Pages/NotFound').default,
        name: 'not-found'
    }
]

export default routes;
