import { NotFound } from '../components/index'

export default [
    {
        path: '/:catchAll(.*)',
        component: NotFound
    }
]
