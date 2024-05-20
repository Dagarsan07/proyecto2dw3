import axios from "axios";
import { defineStore } from "pinia";

export const usePartidaStore = defineStore("partida", () => {
    async function comenzarPartida() {}

    async function guardarPartida() {}

    return { guardarPartida, comenzarPartida };
});
