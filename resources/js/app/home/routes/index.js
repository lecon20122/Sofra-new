import { home} from '../components';

export default [
    {
        path: '/',
        component: home,
        name: 'Home',
        meta: {
            guest: false,
            needsAuth: false,
        }

    },
]
