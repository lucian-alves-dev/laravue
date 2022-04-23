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
                <user-form :data="formData" @submit="onFormSubmit"></user-form>
            </div>

            <div class="box">
                <user-table :data="tableData"></user-table>
            </div>

            <app-paginator :data="paginatorData" @change="onPaginatorChange"></app-paginator>
        </div>
    </main>
</template>

<script>
    import AppApi from "./../../components/AppApi.vue";
    import AppPaginator from "../../components/AppPaginator.vue";
    import UserForm from "./UserForm.vue";
    import UserTable from "./UserTable.vue";

    export default {
        name: "AppContent",
        components: {
            AppPaginator,
            UserForm,
            UserTable,
        },
        data() {return{
            formData: new FormData(),
            paginatorData: [],
            tableData: [],
        }},
        methods: {
            refresh() {

                AppApi.request("get", "users", this.formData)
                .then((response) => {
                    this.tableData = response.content.data;
                    this.paginatorData = {
                        links: response.content.links,
                        total: response.content.total,
                    }
                });

            },
            onFormSubmit(formData) {
                this.formData = formData;
                this.refresh();
            },
            onPaginatorChange(page) {
                this.formData.append("page", page);
                this.refresh();
            }
        },
        mounted() {
            this.refresh();
        },
    };
</script>