import Vue from 'vue';

export const login  = Vue.component('login',require('./Login.vue').default)
export const register = Vue.component('register',require('./Register.vue').default)
export const profile = Vue.component('profile', require('./Profile.vue').default)

