import { login, register ,profile } from '../components';

export default [
    {
        path: '/restaurant-login',
        component: login,
        name: 'loginRestaurant',
        meta: {
            guest: true,
            needsAuth: false,
        }

    },
    {
        path: '/restaurant-register',
        component: register,
        name: 'newRestaurant',
        meta: {
            guest: true,
            needsAuth: false,
        }

    },
    {
        path: '/restaurant-profile',
        component: profile,
        name: 'editRestaurant',
        meta: {
            guest: false,
            needsAuth: true,
        }
    }
]
