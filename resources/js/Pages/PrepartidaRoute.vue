<script setup>
import Card from "primevue/card";
import { useCategoriaStore } from "../stores/categoria";
import { useAuthStore } from "../stores/auth";
import { usePartidaStore } from "../stores/partida";
import { useRouter, useRoute } from "vue-router";
import { ref, onBeforeMount } from "vue";

const router = useRouter();

const categoriaStore = useCategoriaStore();
const categorias = ref([]);

onBeforeMount(() => {
    getAllCategoria();
});

async function getAllCategoria() {
    categorias.value = (await categoriaStore.getAllCategoria()).data;
}

function seleccionarCategoria(id) {
    router.push({ name: 'partida', params: { idCategoria: id } });
}
</script>

<template>
    <div class="container text-center">
        <h2 class="text-2xl lg:text-3xl mt-8">Selecciona una categoría</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
            <Card
                v-for="categoria in categorias"
                class="pt-1 mt-4 mx-auto min-w-[70%] sm:w-full bg-[#1984c2]"
                :key="categoria.id"
                @click="seleccionarCategoria(categoria.id)" 
            >
                <template #content
                    ><span class="text-2xl text-white">{{
                        categoria.nombre
                    }}</span></template
                >
            </Card>
        </div>
    </div>
</template>
