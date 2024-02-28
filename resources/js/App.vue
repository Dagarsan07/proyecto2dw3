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
    <router-view class="px-6 py-4 md:px-14"></router-view>
    <Footer></Footer>
</template>
