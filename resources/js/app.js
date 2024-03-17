import "./bootstrap";
import router from "./router";
import { createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import "../css/app.css";

import "primevue/resources/themes/aura-light-blue/theme.css";

import App from "./App.vue";

const app = createApp(App);
const pinia = createPinia();

app.use(pinia).use(router).use(PrimeVue).mount("#app");
