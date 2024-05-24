<script setup>
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
    <Dropdown
        v-model="categoriaSelected"
        :options="categorias"
        optionLabel="nombre"
        placeholder="Selecciona una categoría"
        class="w-44 sm:min-w-[40%] text-left"
    />
</template>
