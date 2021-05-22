import axios from 'axios';
import { isEmpty, reject } from 'lodash';
import { setHttpToken } from '../../../helpers/index.js'
import localforage from 'localforage'


export const register = ({ dispatch }, { payload, context }) => {
    return axios.post('api/restaurant-register', payload).then((response) => {
        //setToken
        dispatch('setToken', response.data.meta.token).then(() => {
            dispatch('fetchUser')
        })
    }).catch((error) => {
        context.errors = error.response.data.errors
    })
}

export const login = ({ dispatch }, { payload, context }) => {
    return axios.post('api/restaurant-login', payload).then((response) => {
        //setToken
        dispatch('setToken', response.data.meta.token).then(() => {
            dispatch('fetchUser')
        })
        //then fetchUser
    }).catch((error) => {
        context.errors = error.response.data.errors
    })
}

export const profile = ({ }, { payload, context }) => {
    return axios.post('api/profile', payload).then((response) => {
        context.message = response.data.message
    }).catch((error) => {
        context.errors = error.response.data.errors
    })
}
export const logout = ({ dispatch }) => {
    return axios.post('api/restaurant-logout').then((response) => {
        dispatch('clearAuth')
    })
}

export const restaurants = ({ commit }) => {
    return axios.get('api/restaurants').then((response) => {
        commit('setRestaurantData', response.data.data)
        commit('setRestaurantMeta', response.data.meta)
        commit('setRestaurantLinks', response.data.links)
    })
}

export const restaurant = ({ commit }, { payload }) => {
    return axios.get('api/restaurant/', {
        params: {
            id: payload.id
        }
    }).then((response) => {
        commit('setrestaurantByID', response.data.data)
        // console.log(response.data.data);
    })
}

export const restaurantsPaginate = ({ commit }, { payload }) => {
    return axios.get('api/restaurants?page=' + payload.page).then((response) => {
        commit('setRestaurantData', response.data.data)
        commit('setRestaurantMeta', response.data.meta)
        commit('setRestaurantLinks', response.data.links)
    })
}



export const fetchUser = ({ commit }) => {
    return axios.get('api/restaurant-me').then((response) => {
        commit('setAuthenticated', true)
        commit('setUserData', response.data.data)
    })
}

export const setToken = ({ commit, dispatch }, token) => {
    if (isEmpty(token)) {
        return dispatch('checkTokenExists').then((token) => {
            setHttpToken(token)
        })
    }
    commit('setToken', token)
    setHttpToken(token)
}

export const checkTokenExists = ({ commit, dispatch }, token) => {
    return localforage.getItem('authToken').then((token) => {
        if (isEmpty(token)) {
            return Promise.reject('NO_STORAGE_TOKEN')
        }
        return Promise.resolve(token)
    })
}

export const clearAuth = ({ commit }, token) => {
    commit('setAuthenticated', null)
    commit('setUserData', null)
    commit('setToken', null)
    setHttpToken(null)
}

export const addItemToCart = ({ commit, dispatch }, { payload }) => {
    dispatch('checkTokenExists').then((token) => {
        setHttpToken(token)
    });
    console.log(payload);
    return axios.post('api/cart?product_id=' + payload.productID).then((response) => {
        console.log(response.data);
    })
}

