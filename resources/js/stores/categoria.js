import axios from "axios";
import { defineStore } from "pinia";

export const useCategoriaStore = defineStore("categoria", () => {
    async function getAllCategoria() {
        return await axios.get(`api/categorias`);
    }
    return { getAllCategoria };
});
