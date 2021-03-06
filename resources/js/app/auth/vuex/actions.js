import axios from 'axios';
import { isEmpty, reject } from 'lodash';
import { setHttpToken } from '../../../helpers/index.js'
import localforage from 'localforage'


export const register = ({ dispatch }, { payload, context }) => {
    return axios.post('api/register', payload).then((response) => {
        //setToken
        dispatch('setToken', response.data.meta.token).then(() => {
            dispatch('fetchUser')
        })
    }).catch((error) => {
        context.errors = error.response.data.errors
    })
}

export const login = ({ dispatch }, { payload, context }) => {
    return axios.post('api/login', payload).then((response) => {
        //setToken
        dispatch('setToken', response.data.meta.token).then(() => {
            dispatch('fetchUser')
        })
        //then fetchUser
    }).catch((error) => {
        context.errors = error.response.data.errors
    })
}

export const profile = ({ },{payload , context}) => {
    return axios.post('api/profile', payload).then((response) => {
        context.message = response.data.message
    }).catch((error) => {
        context.errors = error.response.data.errors
    })
}
export const logout = ({ dispatch }) => {
    return axios.post('api/logout').then((response) => {
        dispatch('clearAuth')
    })
}

export const fetchUser = ({ commit }) => {
    return axios.get('api/me').then((response) => {
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
