const routes = [
    {
        path: '/form',
        component: require('../Pages/Form').default,
        'name': 'new-form'
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
        name: 'show_service',
        path: '/services/show',
        component: require('../Components/Services').default
    },
    {
        name: 'clients',
        path: '/clients'
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
