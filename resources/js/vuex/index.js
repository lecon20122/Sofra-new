import Vue from 'vue'
import Vuex from 'vuex'
import auth from '../app/auth/vuex'
import restaurants from '../app/restaurants/vuex'
import home from '../app/home/vuex'
import cart from '../app/cart/vuex'
import order from '../app/order/vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        auth: auth,
        restaurants: restaurants,
        home: home,
        cart: cart,
        order: order,
    },

})
