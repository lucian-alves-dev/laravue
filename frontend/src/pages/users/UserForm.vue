<template>
    <form id="formSearch" class="form" @submit="$event.preventDefault(); $emit('submit')">
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
    name: 'UserForm',
    emits: ['submit']
}
</script>