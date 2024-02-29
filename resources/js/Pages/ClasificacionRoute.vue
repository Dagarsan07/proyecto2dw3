<script setup>
import { ref, onBeforeMount } from "vue";
import { useAuthStore } from "../stores/auth";
import axios from "axios";

const authStore = useAuthStore();

const logged = authStore.isLogged;
const username = authStore.username;

const partidas = ref([]);

onBeforeMount(() => {
    getClasificacionGlobal();
});

function getClasificacionGlobal() {
    axios
        .get("api/clasificacion/global")
        .then((response) => {
            console.log(response);
        })
        .error((error) => {
            console.error(error);
        });
}
</script>

<template>
    <div></div>
</template>

<style></style>
