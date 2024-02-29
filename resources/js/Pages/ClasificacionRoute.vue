<script setup>
import { ref, onBeforeMount } from "vue";
import { useAuthStore } from "../stores/auth";
import axios from "axios";
import {
    TailwindPagination,
    RenderlessPagination,
} from "laravel-vue-pagination";

const authStore = useAuthStore();

const logged = authStore.isLogged;
const username = authStore.username;

const itemsPaginaPartida = ref([]);

onBeforeMount(() => {
    getClasificacionGlobal();
});

function getClasificacionGlobal(page = 1) {
    axios
        .get(`api/clasificacion/global?page=${page}`)
        .then((response) => {
            console.log(response);
            itemsPaginaPartida.value = response;
        })
        .catch((error) => {
            console.error(error);
        });
}
</script>

<template>
    <div>
        <h1 class="text-2xl text-center font-semibold">Clasificación</h1>
        <table
            class="mx-auto border-separate border-spacing-2 text-xs sm:min-w-[70%] md:text-sm"
        >
            <thead>
                <th>Pt.</th>
                <th>Jug.</th>
                <th>Ctg.</th>
                <th>Rtdo.</th>
                <th>Tmp.</th>
                <th>Pts.</th>
            </thead>
            <tbody>
                <tr
                    v-for="(partida, index) in itemsPaginaPartida.data.data"
                    :key="index"
                >
                    <td class="pt-2 text-center">
                        {{ itemsPaginaPartida.data.from + index }}
                    </td>
                    <td class="pt-2">{{ partida.username }}</td>
                    <td class="pt-2">{{ partida.nombre }}</td>
                    <td class="pt-2">
                        {{ `${partida.aciertos}/${partida.cant_preguntas}` }}
                    </td>
                    <td class="pt-2">{{ partida.tiempo }}</td>
                    <td class="pt-2">{{ partida.puntuacion }}</td>
                </tr>
            </tbody>
        </table>
        <RenderlessPagination
            :data="itemsPaginaPartida.data"
            :limit="1"
            @pagination-change-page="getClasificacionGlobal"
            v-slot="slotProps"
        >
            <nav
                v-bind="$attrs"
                aria-label="Pagination"
                v-if="slotProps.computed.total > slotProps.computed.perPage"
            >
                <button
                    :disabled="!slotProps.computed.prevPageUrl"
                    v-on="slotProps.prevButtonEvents"
                >
                    <slot name="prev-nav"> &ltrif; </slot>
                </button>

                <select
                    name="pageSelect"
                    id="pageSelect"
                    class="p-2 cursor-pointer w-[50px]"
                    @change="
                        slotProps.pageButtonEvents(slotProps.computed.pageRange)
                    "
                >
                    <option
                        value=""
                        v-for="(page, key) in slotProps.computed.pageRange"
                        :key="key"
                        :selected="
                            slotProps.computed.currentPage == page
                                ? true
                                : false
                        "
                    >
                        {{ page }}
                    </option>
                </select>

                <button
                    :disabled="!slotProps.computed.nextPageUrl"
                    v-on="slotProps.nextButtonEvents"
                    class="p-1"
                >
                    <slot name="next-nav"> &rtrif; </slot>
                </button>
            </nav>
        </RenderlessPagination>
    </div>
</template>

<style></style>
