import axios from 'axios';
import { isEmpty, reject } from 'lodash';
import { setHttpToken } from '../../../helpers/index.js'
import localforage from 'localforage'


export const checkTokenExists = ({ commit, dispatch }, token) => {
    return localforage.getItem('authToken').then((token) => {
        if (isEmpty(token)) {
            return Promise.reject('NO_STORAGE_TOKEN')
        }
        return Promise.resolve(token)
    })
}
export const getCartItems = ({ commit, dispatch }) => {
    dispatch('checkTokenExists').then((token) => {
        setHttpToken(token)
    });
    return axios.get('api/cart-products').then((response) => {
        commit("setCartItems" , response.data)
        commit("getDelivery" , response.data)
    })
}
export const deleteCartItems = ({ commit, dispatch } , {payload}) => {
    dispatch('checkTokenExists').then((token) => {
        setHttpToken(token)
    });
    return axios.get('api/cart-delete?id='+payload.id).then((response) => {
        commit("setCartItems" , response.data)
    })
}
