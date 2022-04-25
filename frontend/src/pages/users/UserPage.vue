<template>
    <main id="app-content">
        <div class="app-limits">

            <header class="page-header">
                <h1>Usuários</h1>
                <div class="box-buttons">
                    <button type="button" class="btn primary" @click="showUserModal">Criar Usuário</button>
                </div>
            </header>

            <div class="box">
                <user-form-search @submit="onFormSearchSubmit"></user-form-search>
            </div>

            <div class="box">
                <user-table :data="tableData" @delete="deleteUser" @edit="showUserEditModal"></user-table>
            </div>

            <page-paginator :data="paginatorData" @change="onPaginatorChange"></page-paginator>
            <user-modal ref="UserModal" @submit="saveUser"></user-modal>

        </div>
    </main>
</template>

<script>
    import PagePaginator from "@/components/PagePaginator.vue";
    import UserFormSearch from "./UserFormSearch.vue";
    import UserTable from "./UserTable.vue";
    import UserModal from "./UserModal.vue";

    export default {
        name: "AppContent",
        components: {
            PagePaginator,
            UserFormSearch,
            UserTable,
            UserModal,
        },
        data() {return{
            formSearchData: new FormData(),
            paginatorData: [],
            tableData: [],
        }},
        methods: {
            refresh() {

                this.FlexLoader.show("Carregando usuários...");
                this.Api.request("get", "users", this.formSearchData)
                .then((response) => {
                    this.tableData = response.content.data;
                    this.paginatorData = {
                        links: response.content.links,
                        total: response.content.total,
                    }
                })
                .catch((error) => {
                    console.error(error);
                    alert("Erro ao buscar os dados do usuário.");
                })
                .finally(() => {
                    this.FlexLoader.hide();
                });

            },
            saveUser(formRegisterData) {

                let method = "post";
                let url = "users";

                if(formRegisterData.get('id')) {
                    method = "put";
                    url += "/" + formRegisterData.get('id');
                }

                this.FlexLoader.show("Salvando usuário...");
                this.Api.request(method, url, formRegisterData)
                .then((response) => {

                    if(formRegisterData.get('photo')) {
                        this.uploadPhoto(response.content, formRegisterData.get('photo'));
                    }

                    this.hideUserModal();
                    this.refresh();
                })
                .catch((error) => {
                    console.error(error);
                    alert("Erro ao salvar os dados do usuário.");
                })
                .finally(() => {
                    this.FlexLoader.hide();
                });

            },
            deleteUser(user) {

                this.FlexLoader.show("Excluindo usuário...");
                this.Api.request("delete", "users/" + user.id)
                .then(() => {
                    this.hideUserModal();
                    this.refresh();
                })
                .catch((error) => {
                    console.error(error);
                    alert("Erro tentar excluir o usuário.");
                })
                .finally(() => {
                    this.FlexLoader.hide();
                });

            },
            uploadPhoto(user, file) {

                let formData = new FormData();
                formData.append("photo", file);

                return this.Api.fileUpload(`users/${user.id}/photo`, formData)
                .then((response) => {
                    console.info(response);
                })
                .catch((error) => {
                    console.error(error);
                    alert("Erro ao salvar a foto do usuário.");
                });

            },
            showUserModal() {
                this.$refs.UserModal.show();
            },
            hideUserModal() {
                this.$refs.UserModal.hide();
            },
            showUserEditModal(user) {
                this.$refs.UserModal.show(user);
            },
            onFormSearchSubmit(formSearchData) {
                this.formSearchData = formSearchData;
                this.refresh();
            },
            onPaginatorChange(page) {
                this.formSearchData.append("page", page);
                this.refresh();
            },
        },
        mounted() {
            this.refresh();
        },
    };
</script>