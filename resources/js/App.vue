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
    <Header></Header>
    <router-view class="container mx-auto px-4 py-4"></router-view>
    <Footer></Footer>
</template>
