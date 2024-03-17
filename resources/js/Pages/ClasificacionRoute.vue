<script setup>
import { ref, onBeforeMount } from "vue";
import { useAuthStore } from "../stores/auth";
import axios from "axios";
import { RenderlessPagination } from "laravel-vue-pagination";

const authStore = useAuthStore();

const logged = authStore.isLogged;
const username = authStore.username;

const itemsCategoriaFilter = ref([]);
const categoriaFilter = ref("");
const itemsJugadorFilter = [{ nombre: "Solo mis partidas", value: "own" }];
const jugadorFilter = ref("");

const itemsPaginaPartida = ref([]);
const paginaActual = ref(1);
const pagAnteriorUrl = ref(false);
const siguientePagUrl = ref(true);
const mostrarPaginacion = ref(true);

const showPageSelect = ref(false);
const showFilters = ref(false);

onBeforeMount(() => {
    getItemsFiltros();
    getClasificacionGlobal();
});

function getClasificacionGlobal(pagina = 1) {
    showFilters.value = false;
    showPageSelect.value = false;

    axios
        .get(`api/clasificacion/global?page=${pagina}`)
        .then((response) => {
            console.log(response.data);
            itemsPaginaPartida.value = response;
            paginaActual.value = response.data.current_page;
            if (response.data.links.length > 3) {
                mostrarPaginacion.value = true;
                pagAnteriorUrl.value =
                    response.data.prev_page_url != null ? true : false;
                siguientePagUrl.value =
                    response.data.next_page_url != null ? true : false;
            } else {
                mostrarPaginacion.value = false;
            }
        })
        .catch((error) => {
            console.error(error);
        });
}

function getClasificacionByCategoria() {}

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

        <button
            class="rounded border border-black p-2 mb-3"
            @click="showFilters = !showFilters"
        >
            Filtros <span v-if="!showFilters">&blacktriangledown;</span>
            <span v-else>&blacktriangle;</span>
        </button>

        <div v-if="showFilters" class="grid grid-cols-2 gap-x-6">
            <div class="col-span-1 flex flex-col">
                <label for="categoriaFilter">Categoría</label>
                <select
                    name="categoriaFilter"
                    id="categoriaFilter"
                    class="p-1 rounded border border-black"
                    v-model="categoriaFilter"
                >
                    <option
                        v-for="(categoria, key) in itemsCategoriaFilter"
                        :value="categoria.nombre"
                        :key="key"
                    >
                        {{ categoria.nombre }}
                    </option>
                </select>
            </div>
            <div class="col-span-1 flex flex-col">
                <label for="jugadorFilter">Jugador</label>
                <select
                    name="jugadorFilter"
                    id="jugadorFilter"
                    class="p-1 rounded border border-black"
                    v-model="jugadorFilter"
                >
                    <option
                        v-for="(jugador, key) in itemsJugadorFilter"
                        :value="jugador.value"
                        :key="key"
                    >
                        {{ jugador.nombre }}
                    </option>
                </select>
            </div>
        </div>

        <table
            class="mx-auto border-separate text-center border-spacing-2 max-sm:text-xs w-full text-sm md:text-md lg:text-lg"
        >
            <thead class="font-medium">
                <tr class="sm:hidden">
                    <td>Pt.</td>
                    <td>Jug.</td>
                    <td>Ctg.</td>
                    <td>Rtdo.</td>
                    <td>Tmp.</td>
                    <td>Pts.</td>
                </tr>
                <tr class="hidden sm:table-row">
                    <td>Puesto</td>
                    <td>Jugador</td>
                    <td>Categoría</td>
                    <td>Resultado</td>
                    <td>Tiempo</td>
                    <td>Puntuación</td>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(partida, index) in itemsPaginaPartida.data.data"
                    :key="index"
                >
                    <td class="pt-4">
                        {{ itemsPaginaPartida.data.from + index }}
                    </td>
                    <td class="pt-4">{{ partida.username }}</td>
                    <td class="pt-4">{{ partida.nombre }}</td>
                    <td class="pt-4">
                        {{ `${partida.aciertos}/${partida.cant_preguntas}` }}
                    </td>
                    <td class="pt-4">{{ partida.tiempo }}</td>
                    <td class="pt-4">{{ partida.puntuacion }}</td>
                </tr>
            </tbody>
        </table>
        <RenderlessPagination
            :data="itemsPaginaPartida.data"
            @pagination-change-page="getClasificacionGlobal"
            v-slot="slotProps"
        >
            <nav
                v-bind="$attrs"
                class="flex justify-center items-start lg:text-left"
                v-if="slotProps.computed.total > slotProps.computed.perPage"
            >
                <button
                    :disabled="!pagAnteriorUrl"
                    v-on="slotProps.prevButtonEvents"
                    class="cursor-pointer px-3 py-1 h-fit focus:border rounded focus:border-black"
                >
                    <slot name="prev-nav">
                        <p class="text-lg md:text-xl">&ltrif;</p>
                    </slot>
                </button>

                <div class="relative" id="dropdownButton">
                    <button
                        class="cursor-pointer px-3 py-1 h-fit focus:border rounded focus:border-black"
                        @click="showPageSelect = !showPageSelect"
                    >
                        {{ paginaActual }}
                    </button>
                    <transition>
                        <div
                            id="dropdown"
                            class="flex flex-col font-normal text-right rounded border border-gray-200 bg-white cursor-pointer gap-3 py-1"
                            v-if="showPageSelect"
                        >
                            <button
                                v-for="(pagina, key) in slotProps.computed
                                    .pageRange"
                                :key="key"
                                v-on="slotProps.pageButtonEvents(pagina)"
                            >
                                {{ pagina }}
                            </button>
                        </div>
                    </transition>
                </div>

                <button
                    :disabled="!siguientePagUrl"
                    v-on="slotProps.nextButtonEvents"
                    class="px-3 py-1 cursor-pointer h-fit focus:border rounded focus:border-black"
                >
                    <slot name="next-nav">
                        <p class="text-lg md:text-xl">&rtrif;</p>
                    </slot>
                </button>
            </nav>
        </RenderlessPagination>
    </div>
</template>

<style></style>
