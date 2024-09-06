import { createRouter, createWebHistory } from "vue-router";

import List from "./components/List.vue";
import Save from "./components/Save.vue";

const routes = [
    //Adentro del array de las rutas, se hace un objeto por cada ruta que se cree
    {
        name: 'list',
        path: '/vue',
        component: List
    },
    {
        name: 'save',
        path: '/vue/save/:slug?',
        component: Save
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,

})

export default router
