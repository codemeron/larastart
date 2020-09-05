/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


//Axios Form Validation API
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Displaying date API
import moment from 'moment';

//Progress bar API
import VueProgressBar from 'vue-progressbar'
const ProgressBarProps = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
  }
Vue.use(VueProgressBar, ProgressBarProps);
//Progress Bar API End

//Sweet Alert API
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
window.Toast = Toast;
//Swwet Alert API end

//For mask input; The Mask input for Vue.js
import VueTheMask from 'vue-the-mask';
Vue.use(VueTheMask);

//Gate.js
import Gate from "./components/Gate";
Vue.prototype.$gate = new Gate(window.user);

//Import the vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    { path: '/applicant', component: require('./components/Applicant.vue').default },
    { path: '/home', component: require('./components/Dashboard.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/applicantlist', component: require('./components/applicant/ApplicantList.vue').default },

    { path: '/registerstudent', component: require('./components/registration/reg_student.vue').default },
    { path: '/registerfaculty', component: require('./components/registration/reg_faculty.vue').default },
    { path: '/registersystemuser', component: require('./components/registration/reg_systemUser.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
  ];

const router = new VueRouter({
  mode: 'history', 
  routes
});

//Filters
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(createdDate){
    return moment(createdDate).format('MMMM DD, YYYY');
});

//Create custom event.
window.Fire = new Vue();

//Passport
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
  'not-found',
  require('./components/NotFound.vue').default
);

Vue.component('pagination', require('laravel-vue-pagination'));


Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('register-tes', require('./components/RegistrationTES.vue').default);


const app = new Vue({
    el: '#app',
    router,
    data: {
      search: ''
    },
    methods: {
      searchit: _.debounce(() => {
        Fire.$emit('searching');
      },1000),

      printme() {
        window.print();
      }
    }
});
