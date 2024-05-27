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
        path: "/partida/:idCategoria",
        name: "partida",
        component: () => import("./Pages/PartidaRoute.vue"),
    },
    {
        path: "/perfil/:id",
        component: () => import("./Pages/PerfilRoute.vue"),
    },
    {
        path: "/register",
        component: () => import("./Pages/RegisterRoute.vue"),
    },
    {
        path: "/login",
        component: () => import("./Pages/LoginRoute.vue"),
    },
    {
        path: "/help",
        component: () => import("./Pages/ManualRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory("proyecto2dw3/public"),
    routes,
});
