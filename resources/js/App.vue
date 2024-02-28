<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
    name: "app",
    components: {
        Header,
        Footer,
    },
};
</script>

<template>
    <Main class="flex flex-col h-screen justify-between">
        <Header></Header>
        <router-view
            class="container grow mx-auto px-4 py-4 mb-auto"
        ></router-view>
        <Footer></Footer>
    </Main>
</template>
