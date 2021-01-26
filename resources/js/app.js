require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import Vue2Filters from 'vue2-filters';
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { Form, HasError, AlertError } from "vform";
import moment from 'moment'

// import Vselect from 'vue-select2'
// import {AutoCompletePlugin} from '@syncfusion/ej2-vue-dropdowns'
import vSelect from 'vselect-component'

Vue.use(vSelect)

library.add(fas)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(Vue2Filters)
// Vue.use(AutoCompletePlugin)

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

const Swal = require('sweetalert2').default;
window.Toast = Swal.mixin({
  toast: true,
  position: 'top-right',
  timer: 3000,
  timerProgressBar: true,
})

window.Fire = new Vue()

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

Vue.mixin({
  methods: {
    convertUnixTS(date){
      moment.locale("id");
      return moment(date, "YYYY-MM-DD").format("D MMMM YYYY");
    },
    dateInputFormat(date){
        return moment(date).format("YYYY-MM-DD");
    },
    convertBoolean(bool){
      if(bool == 1){
        return 'Ya'
      }else{
        return 'Tidak'
      }
      // return moment(date, "YYYY-MM-DD").format("D MMMM YYYY");
    },
  }
})
