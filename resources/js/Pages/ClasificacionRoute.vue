<script setup>
import { ref, onBeforeMount } from "vue";
import { useAuthStore } from "../stores/auth";
import axios from "axios";
import { RenderlessPagination } from "laravel-vue-pagination";

const authStore = useAuthStore();

const logged = authStore.isLogged;
const username = authStore.username;

const itemsPaginaPartida = ref([]);
const paginaActual = ref(1);

const showDropdown = ref(false);

onBeforeMount(() => {
    getClasificacionGlobal(paginaActual);
});

function getClasificacionGlobal(pagina = 1) {
    axios
        .get(`api/clasificacion/global?page=${pagina}`)
        .then((response) => {
            console.log(response.data);
            itemsPaginaPartida.value = response;
            paginaActual.value = response.data.current_page;
        })
        .catch((error) => {
            console.error(error);
        });
}
</script>

<template>
    <div class="w-full lg:max-w-[50%]">
        <h1 class="text-3xl md:text-4xl py-4 text-center font-semibold">
            Clasificación
        </h1>
        <table
            class="mx-auto border-separate border-spacing-2 max-sm:text-xs w-full text-sm md:text-md lg:text-lg"
        >
            <thead>
                <tr class="sm:hidden">
                    <th>Pt.</th>
                    <th>Jug.</th>
                    <th>Ctg.</th>
                    <th>Rtdo.</th>
                    <th>Tmp.</th>
                    <th>Pts.</th>
                </tr>
                <tr class="hidden sm:table-row">
                    <th>Puesto</th>
                    <th>Jugador</th>
                    <th>Categoría</th>
                    <th>Resultado</th>
                    <th>Tiempo</th>
                    <th>Puntuación</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(partida, index) in itemsPaginaPartida.data.data"
                    :key="index"
                    class="text-center"
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
                    v-if="paginaActual == 1 ? false : true"
                    v-on="slotProps.prevButtonEvents"
                    class="cursor-pointer px-3 py-2 h-fit focus:border rounded focus:border-black"
                >
                    <slot name="prev-nav">
                        <p class="text-lg md:text-xl">&ltrif;</p>
                    </slot>
                </button>

                <div class="relative" id="dropdownButton">
                    <button
                        class="cursor-pointer px-3 py-2 h-fit focus:border rounded focus:border-black"
                        @click="showDropdown = !showDropdown"
                    >
                        {{ paginaActual }}
                    </button>
                    <transition>
                        <div
                            id="dropdown"
                            class="flex flex-col font-normal text-right rounded shadow-lg block bg-white cursor-pointer gap-3"
                            v-if="showDropdown"
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
                    v-if="paginaActual == 5 ? false : true"
                    v-on="slotProps.nextButtonEvents"
                    class="px-3 py-2 cursor-pointer h-fit focus:border rounded focus:border-black"
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
