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
    {
        path: "/partida",
        component: () => import("./Pages/PartidaRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory("proyecto2dw3/public"),
    routes,
});
