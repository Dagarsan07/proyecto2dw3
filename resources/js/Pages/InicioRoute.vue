<template>
    <div class="text-center mt-56">
        <h1 class="text-7xl md:text-8xl">Trivia</h1>
        <div class="mx-auto md:text-xl">
            <p class="mt-1">
                Bienvenido a Trivia Challenge, el juego de preguntas y
                respuestas donde pondras a prueba tus conocimientos en
                diferentes temáticas.
            </p>
        </div>
        <div
            class="mx-auto flex flex-col sm:flex-row items-center sm:justify-center gap-y-3 sm:gap-x-5 mt-5"
        >
            <button
                class="text-white text-lg md:text-2xl bg-[#1984c2] rounded hover:bg-[#1574ad] hover:font-semibold transform duration-200 ease-in-out px-3 py-2 min-w-[50%] sm:min-w-[30%]"
            >
                <router-link to="/test">Iniciar sesión</router-link>
            </button>
            <button
                class="text-[#3a7fb8] text-lg md:text-2xl bg-[#d1e6f3] rounded hover:bg-[#acc7ff] hover:font-semibold transform duration-200 ease-in-out px-3 py-2 min-w-[50%] sm:min-w-[30%]"
            >
                <router-link to="/test">Jugar como invitado</router-link>
            </button>
        </div>
    </div>
</template>
