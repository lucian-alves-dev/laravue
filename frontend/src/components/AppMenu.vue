<template>
    <header id="app-menu">
        <nav>
            <a class="item menu-icon" href="#">
                <span class="icon material-icons">menu</span>
                <span class="txt">Menu Principal</span>
            </a>
            <a class="item selected" href="#">
                <span class="icon material-icons">people</span>
                <span class="txt">Usuários</span>
            </a>
            <a class="item" href="#">
                <span class="icon material-icons">question_answer</span>
                <span class="txt">Conversas</span>
            </a>
            <a class="item" href="#">
                <span class="icon material-icons">paid</span>
                <span class="txt">Pagamentos</span>
            </a>
            <a class="item" href="#">
                <span class="icon material-icons">trending_up</span>
                <span class="txt">Tendências</span>
            </a>
            <a class="item" href="#">
                <span class="icon material-icons">rocket_launch</span>
                <span class="txt">Performance</span>
            </a>
            <a class="item" href="#">
                <span class="icon material-icons">security</span>
                <span class="txt">Segurança</span>
            </a>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "AppMenu",
    };
</script>