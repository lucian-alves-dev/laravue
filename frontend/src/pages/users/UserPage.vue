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
                <user-form @submit="refresh()"></user-form>
            </div>

            <div class="box">
                <user-table :users="users"></user-table>
            </div>

            <app-paginator></app-paginator>
        </div>
    </main>
</template>

<script>
    import AppPaginator from "../../components/AppPaginator.vue";
    import UserForm from "./UserForm.vue";
    import UserTable from "./UserTable.vue";
    import AppApi from "./../../components/AppApi.vue";

    export default {
        name: "AppContent",
        components: {
            AppPaginator,
            UserForm,
            UserTable
        },
        data() {return{
            users: []
        }},
        methods: {
            refresh() {

                let form = document.querySelector("#formSearch");
                let formData = new FormData(form);

                AppApi.request("get", "users", formData)
                .then((response) => {
                    this.users = response.content.data;
                });
            },
        },
        mounted() {
            this.refresh();
        },
    };
</script>