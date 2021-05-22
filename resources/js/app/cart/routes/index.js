import { cart} from '../components';

export default [
    {
        path: '/cart',
        component: cart,
        name: 'Cart',
        meta: {
            guest: false,
            needsAuth: true,
        }

    },
]
