<template>
    <table class="flex-table-list">
        <thead>
            <tr>
                <th width="1"></th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Cadastrado em</th>
                <th width="1"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in data" :key="user.id">
                <td>
                    <img class="user-photo" src="{{ user.photo }}" alt="" />
                </td>
                <td data-label="Nome: ">{{ user.name }}</td>
                <td data-label="E-mail: ">{{ user.email }}</td>
                <td data-label="Celular: ">{{ this.Formatter.cellphone(user.cellphone) }}</td>
                <td data-label="Cadastrado em: ">{{ this.Formatter.date(user.created_at) }}</td>
                <td>
                    <div class="btn-drop-down">
                        <div class="txt">
                            <span class="icon material-icons">more_horiz</span>
                        </div>
                        <nav class="list">
                            <span @click="this.$emit('edit', user)">Editar</span>
                            <span @click="this.$emit('delete', user)">Excluir</span>
                        </nav>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "UserTable",
        emits: ['edit', 'delete'],
        props: {
            data: Array,
        },
    };
</script>