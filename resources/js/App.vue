<script>
import Header from "./components/Header.vue";

export default {
    name: "app",
    components: {
        Header,
    },
};
</script>
<template>
    <Header></Header>
    <router-view></router-view>
</template>
