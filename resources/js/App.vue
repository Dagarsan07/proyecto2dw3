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
    <Main class="flex flex-col min-h-[100vh]">
        <Header></Header>
        <router-view
            class="mx-auto px-4 py-4 mb-auto md:max-w-[85%] lg:max-w-[60%]"
        ></router-view>
        <Footer></Footer>
    </Main>
</template>
