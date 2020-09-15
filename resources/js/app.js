require('./bootstrap');
require('./extra');

window.Vue = require('vue');

import Toast from "vue-toastification";
import VueSimpleAlert from "vue-simple-alert";
import jsPDF from "jspdf";

import "vue-toastification/dist/index.css";

Vue.component('bottons-component', require('./components/BottonsComponent.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('calendari-component', require('./components/CalendarComponent.vue').default);
Vue.component('diacamp-component', require('./components/DiaComponent.vue').default);
Vue.component('calendarg-component', require('./components/CalendargComponent.vue').default);
Vue.component('update-component', require('./components/UpdateComponent.vue').default);
Vue.component('afegirguardies-component', require('./components/AfegirguardiesComponent.vue').default);
Vue.component('permisos-component', require('./components/PermisosComponent.vue').default);
Vue.component('permisos-component-tots', require('./components/PermisosComponentTots.vue').default);
Vue.component('controlusuaris-component', require('./components/ControlusuarisComponent.vue').default);
Vue.component('estadisticas-component', require('./components/EstadisticasComponent.vue').default);
Vue.component('centres-component', require('./components/CentresComponent.vue').default);



Vue.use(Toast, {
    transition: "Vue-Toastification__bounce",
    maxToasts: 5,
    newestOnTop: true
  });
Vue.use(VueSimpleAlert);
Vue.use(jsPDF);

const app = new Vue({
    el: '#app',
});
