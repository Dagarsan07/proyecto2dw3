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
        path: "/prepartida",
        component: () => import("./Pages/PrepartidaRoute.vue"),
    },
    {
        path: "/partida/:categoriaId",
        component: () => import("./Pages/PartidaRoute.vue"),
    },
    {
        path: "/perfil/:id",
        component: () => import("./Pages/PerfilRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory("proyecto2dw3/public"),
    routes,
});
