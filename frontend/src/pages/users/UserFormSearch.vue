<template>
    <form id="formSearch" class="form" @submit="preSubmit($event)">
        <div class="form-row">
            <div class="form-col grow">
                <label>Nome</label>
                <input type="text" name="name" />
            </div>
            <div class="form-col">
                <label>Email</label>
                <input type="text" name="email" />
            </div>
            <div class="form-col">
                <label>Celular</label>
                <input type="text" name="cellphone" />
            </div>
            <div class="form-col">
                <label>&nbsp;</label>
                <button class="btn secondary" type="submit">Buscar</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: 'UserFormSearch',
    emits: ['submit'],
    methods: {
        preSubmit(event) {
            event.preventDefault();
            let form = document.querySelector("#formSearch");
            this.$emit('submit', new FormData(form));
        }
    }
}
</script>