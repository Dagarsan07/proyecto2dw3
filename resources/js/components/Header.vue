<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

const logged = authStore.isLogged;
const username = authStore.username;

const showMobileMenu = ref(false);
const showDropdown = ref(false);

function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
</script>

<template>
    <div
        class="bg-[#3a7fb8] text-white flex justify-between md:justify-center px-4 md:px-8 py-6 items-center sticky top-0 z-20"
    >
        <h1 class="mr-8">Logo</h1>

        <!-- Menu navegación mobile start -->
        <label
            class="relative z-40 cursor-pointer px-2 py-3 md:hidden"
            for="mobile-menu"
        >
            <input
                class="peer hidden"
                type="checkbox"
                v-model="showMobileMenu"
                id="mobile-menu"
            />
            <div
                class="relative z-50 block h-[2px] w-7 bg-transparent content-[''] before:absolute before:top-[-0.35rem] before:z-50 before:block before:h-full before:w-full before:bg-white before:transition-all before:duration-300 before:ease-out before:content-[''] after:absolute after:right-0 after:bottom-[-0.35rem] after:block after:h-full after:w-full after:bg-white after:transition-all after:duration-300 after:ease-out after:content-[''] peer-checked:bg-transparent before:peer-checked:top-0 before:peer-checked:w-full before:peer-checked:rotate-45 before:peer-checked:transform before:peer-checked:bg-white after:peer-checked:bottom-0 after:peer-checked:w-full after:peer-checked:-rotate-45 after:peer-checked:transform after:peer-checked:bg-white"
            ></div>
            <div
                class="fixed top-0 right-0 z-40 h-full w-full translate-x-full overflow-y-auto overscroll-y-none transition duration-500 peer-checked:translate-x-0"
            >
                <div
                    class="float-right text-right text-white text-4xl min-h-full w-[100%] bg-black/50 backdrop-blur-sm px-8 pt-20 z-30 shadow-2xl"
                >
                    <menu class="flex flex-col gap-7 mt-2">
                        <li @click="showMobileMenu = !showMobileMenu">
                            <router-link to="/">Jugar</router-link>
                        </li>
                        <li @click="showMobileMenu = !showMobileMenu">
                            <router-link to="/" v-if="!logged"
                                >Identificarse</router-link
                            >
                            <router-link v-else to="/">
                                {{ username }}
                            </router-link>
                        </li>
                        <li @click="showMobileMenu = !showMobileMenu">
                            <router-link to="/clasificacion"
                                >Clasificación</router-link
                            >
                        </li>
                        <li
                            v-if="logged"
                            @click="showMobileMenu = !showMobileMenu"
                        >
                            <router-link to="/">Cerrar sesión</router-link>
                        </li>
                        <li @click="showMobileMenu = !showMobileMenu">
                            <router-link to="/">Ayuda</router-link>
                        </li>
                    </menu>
                </div>
            </div>
        </label>
        <!-- Menu navegación mobile end -->

        <!-- Menu navegación desktop start -->
        <menu class="max-md:hidden flex gap-8 text-lg">
            <li class="hover:font-semibold transform duration-300 ease-in-out">
                <router-link to="/">Jugar</router-link>
            </li>
            <li class="hover:font-semibold transform duration-300 ease-in-out">
                <router-link to="/">Ayuda</router-link>
            </li>
            <li class="hover:font-semibold transform duration-300 ease-in-out">
                <router-link to="/clasificacion">Clasificación</router-link>
            </li>
            <li class="hover:font-semibold transform duration-300 ease-in-out">
                <router-link to="/" v-if="!logged">Identificarse</router-link>
                <div class="relative" id="dropdownButton" v-else>
                    <div
                        class="cursor-pointer flex justify-between"
                        @click="toggleDropdown()"
                    >
                        {{ username }}
                    </div>
                    <transition>
                        <div
                            id="dropdown"
                            class="flex flex-col text-lg font-normal text-right text-[#3a7fb8] rounded shadow-lg absolute bg-white cursor-pointer w-[150px] top-[52px] -right-4"
                            v-show="showDropdown"
                        >
                            <router-link
                                to="/"
                                class="hover:bg-[#d1e6f3] hover:font-semibold transform duration-300 ease-in-out py-3 px-4 rounded"
                                >Perfil</router-link
                            >
                            <router-link
                                to="/"
                                class="hover:bg-[#d1e6f3] hover:font-semibold transform duration-300 ease-in-out py-3 px-4 rounded"
                                >Cerrar sesión</router-link
                            >
                        </div>
                    </transition>
                </div>
            </li>
        </menu>
        <!-- Menu navegación desktop end -->
    </div>
</template>

<style>
.v-move,
.v-enter-active,
.v-leave-active {
    transition: 0.2s ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}
</style>
