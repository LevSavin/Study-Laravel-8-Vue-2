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
        path: '/',
        component: require('../Pages/Home').default,
        'name': 'home'
    },


    {
        path: '/about',
        component: require('../Pages/About').default,
        'name': 'about'
    },

    {
        name: 'register',
        path: '/register',
        component: require('../Pages/Register').default,
    },

    {
        name: 'login',
        path: '/login',
        component: require('../Pages/Login').default
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: require('../Pages/Dashboard').default
    },
    {
        name: 'services',
        path: '/services',
        component: require('../Components/Services').default
    },
    {
        name: 'addservice',
        path: '/services/add',
        component: require('../Components/AddService').default
    },
    {
        name: 'editservice',
        path: '/services/edit/:id',
        component: require('../Components/EditService').default
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
