import Vue from 'vue';
import Router from 'vue-router';
import { routes as routes } from '../app/index.js'
import beforeEach from './beforeEach.js'




Vue.use(Router)

const router = new Router({
    routes: routes,
})


router.beforeEach(beforeEach)


export default router
