import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(BootstrapVue);


const app = new Vue({
    el: '#app'
});


// window.onload = function () {
//     var main = new Vue({
//         el: '#app',
//         data: {
//             currentActivity: 'home'
//         }
//     });
// }