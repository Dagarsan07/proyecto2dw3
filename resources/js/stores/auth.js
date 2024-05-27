import { defineStore } from "pinia";
import { ref } from "vue";

export const useAuthStore = defineStore("auth", () => {
    const isLogged = ref(false);
    const usuario = ref({
        name: "Nombre",
        surname: "Prueba",
        username: "nomprueba",
        email: "prueba@correo.com",
        password: "pass1234",
        role: "ADMIN",
    });

    return { isLogged, usuario };
});
