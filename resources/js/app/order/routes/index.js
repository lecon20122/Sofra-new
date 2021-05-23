import { order } from '../components';

export default [
    {
        path: '/orders',
        component: order,
        name: 'Order',
        meta: {
            needsAuth: true,
        }

    },
]
