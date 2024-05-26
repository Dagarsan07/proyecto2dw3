<template>

</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const preguntas = ref([]);
const indicePregunta = ref(0);
const puntuacion = ref(0);

const route = useRoute();

onMounted(() => {
    const idCategoria = route.params.idCategoria;
    getPreguntas(idCategoria);
})

const preguntaActual = computed(() => {
    return preguntas.value[indicePregunta.value];
})

async function getPreguntas(idCategoria) {
    try {
        console.log(idCategoria);
        const response = await axios.get(`api/preguntas/${idCategoria}`);
        console.log(response);
        preguntas.value = response.data;
    } catch (error) {
        console.error('Error al obtener las preguntas: ', error);
    }
}

function gestionarRespuesta(respuesta) {
    if (respuesta === preguntaActual.value.res_correcta) {
        puntuacion.value = puntuacion.value + 10000;
    }
}

function restart() {
    indicePregunta.value = 0;
    puntuacion.value = 0;
    const idCategoria = route.params.idCategoria;
}
</script>

