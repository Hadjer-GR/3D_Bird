import './bootstrap';
import '../css/app.css';
import '../css/bootstrap.min.css';
import '../css/style.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import {Link,Head,useForm} from "@inertiajs/vue3"


// import {pagination} from 'laravel-vue-pagination';
// import { BPagination } from 'bootstrap-vue'
// import  {BPagination } from '../../node_modules/bootstrap-vue'
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(useForm)
            // .use(ProgressBar,ProgressBar)
            .component('Link',Link)
            .component('Head',Head)
            .mixin({methods:{route}})
            .mount(el);
    },
    progress: {
        color: '#4B5563',
        includeCSS: true,
    },
});
