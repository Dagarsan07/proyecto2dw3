<script setup>
import Card from "primevue/card";
import { useCategoriaStore } from "../stores/categoria";
import { useAuthStore } from "../stores/auth";
import { usePartidaStore } from "../stores/partida";
import { useRouter, useRoute } from "vue-router";
import { ref, onBeforeMount } from "vue";

const categoriaStore = useCategoriaStore();
const categorias = ref([]);
const categoriaSelected = ref("");

onBeforeMount(() => {
    getAllCategoria();
});

async function getAllCategoria() {
    categorias.value = (await categoriaStore.getAllCategoria()).data;
}
</script>

<template>
    <div class="container text-center">
        <h2 class="text-2xl mt-8">Selecciona una categoría</h2>
        <Card
            v-for="categoria in categorias"
            class="pt-1 mt-4 mx-auto bg-[#1984c2]"
        >
            <template #content
                ><span class="text-2xl text-white">{{
                    categoria.nombre
                }}</span></template
            >
        </Card>
    </div>
</template>
