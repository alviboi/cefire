require('./bootstrap');
require('./extra');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('calendari-component', require('./components/CalendarComponent.vue').default);
Vue.component('diacamp-component', require('./components/DiaComponent.vue').default);
Vue.component('calendarg-component', require('./components/CalendargComponent.vue').default);
Vue.component('update-component', require('./components/UpdateComponent.vue').default);
Vue.component('afegirguardies-component', require('./components/AfegirguardiesComponent.vue').default);
Vue.component('permisos-component', require('./components/PermisosComponent.vue').default);


const app = new Vue({
    el: '#app',
});
