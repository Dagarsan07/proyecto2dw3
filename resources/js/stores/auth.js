import { defineStore } from "pinia";
import { ref } from "vue";

export const useAuthStore = defineStore("auth", () => {
    const isLogged = ref(true);
    const username = ref("David");

    return { isLogged, username };
});
