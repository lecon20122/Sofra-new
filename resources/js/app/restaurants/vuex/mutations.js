import localforage from 'localforage'
import {isEmpty} from 'lodash'

export const setToken = (state, token) => {
    //check empty and remove token
    if (isEmpty(token)) {
        localforage.removeItem('authToken', token)
    }
    localforage.setItem('authToken' , token)
}
export const setAuthenticated = (state, trueOrFalse) => {
    state.user.authenticated = trueOrFalse
}
export const setUserData = (state, userData) => {
    state.user.data = userData
}
export const setRestaurantData = (state, RestaurantData) => {
    state.restaurant.data = RestaurantData
}
export const setRestaurantMeta = (state, RestaurantMeta) => {
    state.restaurant.meta = RestaurantMeta
}
export const setRestaurantLinks = (state, RestaurantLinks) => {
    state.restaurant.links = RestaurantLinks
}
export const setrestaurantByID = (state, RestaurantLinks) => {
    state.restaurantByID.data = RestaurantLinks
}
