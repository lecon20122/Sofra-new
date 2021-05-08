import { login, register ,profile } from '../components';

export default [
    {
        path: '/login',
        component: login,
        name: 'Login',
        meta: {
            guest: true,
            needsAuth: false,
        }

    },
    {
        path: '/register',
        component: register,
        name: 'Register',
        meta: {
            guest: true,
            needsAuth: false,
        }

    },
    {
        path: '/profile',
        component: profile,
        name: 'Profile', 
        meta: {
            guest: false,
            needsAuth: true,
        }

    }
]
