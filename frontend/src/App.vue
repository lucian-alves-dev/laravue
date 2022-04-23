<template>
    <app-menu></app-menu>
    <user-page></user-page>
</template>

<script>
    import AppMenu from "./components/AppMenu.vue";
    import UserPage from "./pages/users/UserPage.vue";

    export default {
        name: "App",
        components: {
            AppMenu,
            UserPage,
        },
    };
</script>