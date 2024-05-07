<script setup>
import { useCategoriaStore } from "../stores/categoria";
import { ref, onBeforeMount } from "vue";
import Carousel from "primevue/carousel";

const categoriaStore = useCategoriaStore();

const categorias = ref([]);

async function getAllCategoria() {
    categorias.value = (await categoriaStore.getAllCategoria()).data;
}

onBeforeMount(() => {
    getAllCategoria();
});
</script>
<template>
    <div class="mt-24 max-w-[100%] flex flex-col">
        <h1 class="text-center">Selecciona la categoria</h1>
        <Carousel :value="categorias" :num-scroll="1" circular>
            <template #item="slotProps">
                <div
                    class="border rounded bg-[#3a7fb8] text-white text-center text-5xl m-2 py-8"
                >
                    <div class="font-medium">{{ slotProps.data.nombre }}</div>
                </div>
            </template>
        </Carousel>
        <button
            class="mx-auto text-white text-lg md:text-2xl bg-[#1984c2] rounded hover:bg-[#1574ad] hover:font-semibold transform duration-200 ease-in-out p-2 w-44"
        >
            Empezar partida
        </button>
    </div>
</template>
