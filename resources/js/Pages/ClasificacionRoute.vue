<script setup>
import { ref, onBeforeMount } from "vue";
import { useAuthStore } from "../stores/auth";
import axios from "axios";

const authStore = useAuthStore();

const logged = authStore.isLogged;
const username = authStore.username;

// FILTROS
const itemsCategoriaFilter = ref([]);
const categoriaFilter = ref("");
const jugadorFilter = ref(false);

// ITEMS TABLA
const itemsPaginaPartida = ref([]);

// PAGINACIÓN
const paginaActual = ref(1);
const primerReg = ref(0);
const filasPag = ref(0);
const totalPag = ref(0);

// MOSTRAR/OCULTAR DESPLEGABLES
const showPageSelect = ref(false);
const showFilters = ref(false);

onBeforeMount(() => {
    const defaultValues = {
        page: 0,
    };
    getItemsFiltros();
    getClasificacionGlobal(defaultValues);
});

function getClasificacion(pagina = 1) {
    showFilters.value = false;
    showPageSelect.value = false;
    if (jugadorFilter.value === true) {
        if (categoriaFilter.value != "") {
            getClasificacionByCategoria(pagina);
        } else {
            getClasificacionPersonal();
        }
    } else {
        if (categoriaFilter.value != "") {
            getClasificacionByCategoria(pagina);
        } else {
            getClasificacionGlobal(pagina);
        }
    }
}

function getClasificacionGlobal(event) {
    axios
        .get(`api/clasificacion/global?page=${event.page + 1}`)
        .then((response) => {
            console.log(response);
            itemsPaginaPartida.value = response;
            paginaActual.value = response.data.current_page;
        })
        .catch((error) => {
            console.error(error);
        });
}

function getClasificacionByCategoria(event = 0) {
    console.log(event);
    axios
        .get(
            `api/clasificacion/global/${categoriaFilter.value.nombre}?page=${
                event.page + 1
            }`
        )
        .then((response) => {
            console.log(response.data);
            itemsPaginaPartida.value = response;
            paginaActual.value = response.data.current_page;
        })
        .catch((error) => {
            console.error(error);
        });
}

function getClasificacionPersonal() {
    console.log("Tus Partidas");
}

function getItemsFiltros() {
    axios
        .get(`api/categorias`)
        .then((response) => {
            console.log(response.data);
            itemsCategoriaFilter.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
}
</script>

<template>
    <div class="w-full lg:max-w-[50%]">
        <h1 class="text-3xl md:text-4xl py-4 text-center font-semibold">
            Clasificación
        </h1>

        <ToggleButton
            v-model="showFilters"
            offLabel="Filtros &blacktriangledown;"
            onLabel="Filtros &blacktriangle;"
        />

        <div
            v-if="showFilters"
            class="grid grid-cols-1 gap-y-4 text-sm mt-3 mb-4"
        >
            <Dropdown
                id="categoria-drop"
                class="w-full"
                v-model="categoriaFilter"
                :options="itemsCategoriaFilter"
                optionLabel="nombre"
                placeholder="Categoría"
                @change="getClasificacionByCategoria()"
            />
            <div class="flex items-center gap-2">
                <Checkbox
                    id="jugador-checkbox"
                    v-model="jugadorFilter"
                    :binary="true"
                />
                <label for="jugador-checkbox">Mostrar solo mis partidas</label>
            </div>
        </div>

        <DataTable
            :value="itemsPaginaPartida.data.data"
            :first="itemsPaginaPartida.data.from - 1"
            :paginator="true"
            :rows="itemsPaginaPartida.data.per_page"
            :lazy="true"
            :totalRecords="itemsPaginaPartida.data.total"
            paginatorTemplate="FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
            currentPageReportTemplate="Puestos del {first} al {last} sobre {totalRecords}"
            @page="getClasificacion($event)"
        >
            <Column header="Jug." field="username"></Column>
            <Column header="Ctg." field="nombre"></Column>
            <Column header="Rtdo.">
                <template #body="resultado">
                    {{ resultado.data.aciertos }}/{{
                        resultado.data.cant_preguntas
                    }}
                </template>
            </Column>
            <Column header="Tmp." field="tiempo"></Column>
            <Column header="Pts." field="puntuacion"></Column>
        </DataTable>
    </div>
</template>

<style></style>
