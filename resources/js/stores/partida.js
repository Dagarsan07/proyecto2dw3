import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const usePartidaStore = defineStore("partida", () => {
    const partidaActual = ref();

    const preguntasPartida = ref([]);

    async function comenzarPartida() {}

    async function guardarPartida() {}

    return { partidaActual, preguntasPartida, guardarPartida, comenzarPartida };
});
