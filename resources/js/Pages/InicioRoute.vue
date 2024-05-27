<script setup>
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
</script>

<template>
    <div class="text-center mt-52">
        <h1 class="text-7xl md:text-8xl">Trivia</h1>
        <p class="mx-auto text-sm md:text-xl mt-1 font-normal">
            Bienvenido a Txurditest. Selecciona una categoria en la cual poner a
            prueba tu conocimiento, respondiendo a diferentes preguntas y
            compitiendo con otros jugadores.
        </p>
        <div class="mx-auto flex flex-col items-center gap-y-3 sm:gap-x-5 mt-5">
            <button
                class="text-white text-lg md:text-xl bg-[#1984c2] rounded hover:bg-[#1574ad] hover:font-semibold transform duration-200 ease-in-out px-3 py-2 min-w-[40%] sm:min-w-[30%]"
            >
                <router-link to="/prepartida" v-if="authStore.isLogged"
                    >Jugar</router-link
                >
                <router-link to="/login" v-else>Iniciar sesión</router-link>
            </button>
            <router-link
                v-if="!authStore.isLogged"
                class="text-md hover:text-[#1984c2] hover:underline transform duration-200 ease-in-out"
                to="/prepartida"
                >Jugar como invitado</router-link
            >
        </div>
    </div>
</template>
