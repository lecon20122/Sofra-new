import { login, register, profile, index , restaurant } from '../components';

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
        },
    },
    {
        path: '/restaurants',
        component: index,
        name: 'Restaurants',
        meta: {
            guest: false,
            needsAuth: false,
        }
    },
    {
        path: '/restaurant/:id/:slug',
        props : true,
        component: restaurant,
        name: 'Restaurant',
        meta: {
            guest: false,
            needsAuth: false,
        }
    }
]
