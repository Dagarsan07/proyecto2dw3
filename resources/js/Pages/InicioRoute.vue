<script setup>
import { useCategoriaStore } from "../stores/categoria";
import { useAuthStore } from "../stores/auth";
import { ref, onBeforeMount } from "vue";

const categoriaStore = useCategoriaStore();
const authStore = useAuthStore();

const categorias = ref([]);
const categoriaSelected = ref("");

async function getAllCategoria() {
    categorias.value = (await categoriaStore.getAllCategoria()).data;
    console.log(categorias.value);
}

onBeforeMount(() => {
    getAllCategoria();
});
</script>

<template>
    <div class="text-center mt-52">
        <h1 class="text-7xl md:text-8xl">Trivia</h1>
        <div class="mx-auto md:text-xl">
            <p class="mt-1">
                Bienvenido a Trivia Challenge. Selecciona una categoria en la
                cual poner a prueba tu conocimiento, respondiendo a diferentes
                preguntas y compitiendo con otros jugadores.
            </p>
        </div>
        <div class="mx-auto flex flex-col items-center gap-y-3 sm:gap-x-5 mt-5">
            <Dropdown
                v-model="categoriaSelected"
                :options="categorias"
                optionLabel="nombre"
                placeholder="Selecciona una categoría"
                class="w-44 sm:min-w-[40%] text-left"
            />
            <button
                class="text-white text-lg md:text-xl bg-[#1984c2] rounded hover:bg-[#1574ad] hover:font-semibold transform duration-200 ease-in-out px-3 py-2 min-w-[40%] sm:min-w-[30%]"
            >
                <router-link to="/partida" v-if="authStore.isLogged"
                    >Jugar</router-link
                >
                <router-link to="/partida" v-else
                    >Jugar como invitado</router-link
                >
            </button>
            <router-link
                class="text-sm hover:text-[#1984c2] hover:underline transform duration-200 ease-in-out"
                to="/clasificacion"
                >¿Tienes cuenta? Inicia sesión</router-link
            >
        </div>
    </div>
</template>
