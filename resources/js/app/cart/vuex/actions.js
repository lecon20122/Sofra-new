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
        commit("setProduct", isEmpty( response.data[0]['product'] ) ? null : response.data[0]['product'] )
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
export const editCartItems = ({ commit, dispatch } , {payload}) => {
    dispatch('checkTokenExists').then((token) => {
        setHttpToken(token)
    });
    return axios.get('api/cart-edit?id=' + payload.id + '&' + 'notes=' + payload.notes + '&' + 'qty=' + payload.qty).then((response) => {
        console.log(response.data);
    });
}

export const newOrder = ({ commit, dispatch }, { payload, context}) => {
    dispatch('checkTokenExists').then((token) => {
        setHttpToken(token)
    });
    return axios.post('api/order?restaurant_id=' + payload.restaurant_id + '&' + 'notes=' + payload.notes + '&' + 'address=' + payload.address).then((response) => {
        //
    }).catch((error) => {
        context.errors = error.response.data.errors
    });
}
