import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})
/*
import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from "vue";
import Toastr from "vue-toastr";

Vue.use(InertiaApp);
Vue.use(Toastr);
const app = document.getElementById("app");

new Vue({
    render:(h)=>
    h(InertiaApp,{
        props:{
            initialPage:JSON.parse(app.dataset.page),
            resolveComponent:(name)=>require(`./Pages/${name}`).default,
        },
    }),
}).$mount(app);
*/
