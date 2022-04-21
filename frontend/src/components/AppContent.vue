<template>
    <main id="app-content">
        <div class="app-limits">

            <header class="page-header">
                <h1>Usuários</h1>
                <div class="box-buttons">
                    <a class="btn primary" href="#">Criar Usuário</a>
                </div>
            </header>

            <div class="box">
                <user-form></user-form>
            </div>

            <div class="box">
                <user-table></user-table>
            </div>

            <app-paginator></app-paginator>
        </div>
    </main>
</template>

<script>
    import AppPaginator from "./AppPaginator.vue";
    import UserForm from "./users/UserForm.vue";
    import UserTable from "./users/UserTable.vue";

    export default {
        name: "AppContent",
        components: {
            AppPaginator,
            UserForm,
            UserTable
        },
    };
</script>