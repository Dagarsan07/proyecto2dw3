<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

const logged = authStore.isLogged;
</script>

<template>
    <div
        class="bg-gray-400 flex justify-between px-4 md:px-8 py-6 items-center"
    >
        <h1>Logo</h1>

        <!-- Menu navegación mobile start -->
        <label
            class="relative z-40 cursor-pointer px-2 py-3 md:hidden"
            for="mobile-menu"
        >
            <input class="peer hidden" type="checkbox" id="mobile-menu" />
            <div
                class="relative z-50 block h-[2px] w-7 bg-black bg-transparent content-[''] before:absolute before:top-[-0.35rem] before:z-50 before:block before:h-full before:w-full before:bg-black before:transition-all before:duration-200 before:ease-out before:content-[''] after:absolute after:right-0 after:bottom-[-0.35rem] after:block after:h-full after:w-full after:bg-black after:transition-all after:duration-200 after:ease-out after:content-[''] peer-checked:bg-transparent before:peer-checked:top-0 before:peer-checked:w-full before:peer-checked:rotate-45 before:peer-checked:transform after:peer-checked:bottom-0 after:peer-checked:w-full after:peer-checked:-rotate-45 after:peer-checked:transform"
            ></div>
            <div
                class="fixed inset-0 z-40 hidden h-full w-full bg-black/50 backdrop-blur-sm peer-checked:block"
            >
                &nbsp;
            </div>
            <div
                class="fixed top-0 right-0 z-40 h-full w-full translate-x-full overflow-y-auto overscroll-y-none transition duration-500 peer-checked:translate-x-0"
            >
                <div
                    class="float-right text-right text-2xl sm:text-3xl min-h-full w-[65%] sm:w-[50%] bg-white px-8 pt-20 shadow-2xl"
                >
                    <menu class="flex flex-col gap-4 mt-2">
                        <li><router-link to="/">Jugar</router-link></li>
                        <li>
                            <router-link to="/" v-if="!logged"
                                >Identificarse</router-link
                            >
                            <router-link v-else to="/"> Perfil </router-link>
                        </li>
                        <li v-if="logged">
                            <router-link to="/">Historial</router-link>
                        </li>
                        <li><router-link to="/">Ranking</router-link></li>
                        <li v-if="logged">
                            <router-link to="/">Cerrar sesión</router-link>
                        </li>
                        <li>
                            <router-link to="/">Ayuda</router-link>
                        </li>
                    </menu>
                </div>
            </div>
        </label>
        <!-- Menu navegación mobile end -->

        <!-- Menu navegación desktop start -->
        <menu class="max-md:hidden flex gap-8 text-md">
            <li><router-link to="/">Jugar</router-link></li>
            <li>
                <router-link to="/">Ayuda</router-link>
            </li>
            <li><router-link to="/">Ranking</router-link></li>
            <li v-if="logged">
                <router-link to="/">Historial</router-link>
            </li>
            <li v-if="logged">
                <router-link to="/">Cerrar sesión</router-link>
            </li>
            <li>
                <router-link to="/" v-if="!logged">Identificarse</router-link>
                <router-link v-else to="/">Perfil</router-link>
            </li>
        </menu>
        <!-- Menu navegación desktop end -->
    </div>
</template>

<style></style>
