import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/InicioRoute.vue"),
    },
    {
        path: "/clasificacion",
        component: () => import("./Pages/ClasificacionRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory("proyecto2dw3/public"),
    routes,
});
