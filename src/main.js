import {createApp} from 'vue';
import App from './App.vue';
import router from "./router/routes";
// import AxiosPlugin from './axios'; // Adjust the path as needed

// use App as the options object


const Vue=createApp(App);
Vue.use(router);
// Vue.use(AxiosPlugin);
// Vue.use(VueRouter);

Vue.mount("#app");
