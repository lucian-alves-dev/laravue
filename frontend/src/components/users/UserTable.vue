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
            <tr>
                <td>
                    <img
                        class="user-photo"
                        src="/img/marina-person.jpg"
                        alt=""
                    />
                </td>
                <td data-label="Nome: ">Maria Person da Silva</td>
                <td data-label="E-mail: ">maria@laravue.com</td>
                <td data-label="Celular: ">(14) 99758-9986</td>
                <td data-label="Cadastrado em: ">20/04/2022 14:20</td>
                <td>
                    <div class="btn-drop-down">
                        <div class="txt">
                            <span class="icon material-icons">more_horiz</span>
                        </div>
                        <nav class="list">
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>
                        </nav>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <img
                        class="user-photo"
                        src="/img/marina-person.jpg"
                        alt=""
                    />
                </td>
                <td data-label="Nome: ">Maria Person da Silva</td>
                <td data-label="E-mail: ">maria@laravue.com</td>
                <td data-label="Celular: ">(14) 99758-9986</td>
                <td data-label="Cadastrado em: ">20/04/2022 14:20</td>
                <td>
                    <div class="btn-drop-down">
                        <div class="txt">
                            <span class="icon material-icons">more_horiz</span>
                        </div>
                        <nav class="list">
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>
                        </nav>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <img
                        class="user-photo"
                        src="/img/marina-person.jpg"
                        alt=""
                    />
                </td>
                <td data-label="Nome: ">Maria Person da Silva</td>
                <td data-label="E-mail: ">maria@laravue.com</td>
                <td data-label="Celular: ">(14) 99758-9986</td>
                <td data-label="Cadastrado em: ">20/04/2022 14:20</td>
                <td>
                    <div class="btn-drop-down">
                        <div class="txt">
                            <span class="icon material-icons">more_horiz</span>
                        </div>
                        <nav class="list">
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>
                        </nav>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: 'UserTable'
}
</script>