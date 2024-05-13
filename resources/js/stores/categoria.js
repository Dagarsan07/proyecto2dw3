import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useCategoriaStore = defineStore("categoria", () => {
    async function getAllCategoria() {
        return await axios.get(`api/categorias`);
    }
    return { getAllCategoria };
});
