/* eslint-disable no-unused-vars */
import { createRouter,createWebHashHistory } from "vue-router";
import VueRouter from "vue-router"

import general from "../views/GeneralPage.vue";

const router=createRouter({
    history: createWebHashHistory(),
    routes:[
    {path:"/",
    component:general,
    meta: {
        headerClass: 'home-header',
        class: 'home-content',
        requiresAuth: true,
        verify: true,
      },},

    ]
});

export default router;