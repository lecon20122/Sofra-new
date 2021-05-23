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
export const getOrderItems = ({ commit, dispatch }) => {
    dispatch('checkTokenExists').then((token) => {
        setHttpToken(token)
    });
    return axios.post('api/my-order').then((response) => {
        commit("setOrderItems" , response.data)
    })
}
