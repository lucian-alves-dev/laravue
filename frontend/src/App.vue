<template>
    <app-menu></app-menu>
    <app-content></app-content>
</template>

<script>
    import AppMenu from "./components/AppMenu.vue";
    import AppContent from "./components/AppContent.vue";

    export default {
        name: "App",
        components: {
            AppMenu,
            AppContent,
        },
    };
</script>