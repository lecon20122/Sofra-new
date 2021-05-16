import axios from 'axios';
import { isEmpty, reject } from 'lodash';
import { setHttpToken } from '../../../helpers/index.js'
import localforage from 'localforage'


export const search = ({ commit } , {payload}) => {
    return axios.get('api/search', {
        params: {
            keyword : payload.keyword
        }
    }).then((response) => {
        commit('setResults', response.data.data)
    })
}
