<template>
    <div :class="'flex-modal-overlay ' + (this.hidden ? 'hidden' : '')">
        <form id="formUser" class="flex-modal" @submit="preSubmit($event)">
            <header class="header">
                <h1 class="title">Cadastro de Usuário</h1>
                <button type="button" class="btn-close" @click="hide">&#10005;</button>
            </header>
            <div class="body">

                <input type="hidden" name="id">

                <div class="row center">
                    <div class="col user-photo">
                        
                        <img src="/img/user-no-photo.svg" alt="">
                        <input type="file" name="photo" id="inputPhoto" accept=".jpg, .jpeg, .png, .webp" class="hidden">
                        <label for="inputPhoto">Alterar Foto</label>

                    </div>
                    <div class="col grow">
                        <div class="form-row">
                            
                            <div class="form-col grow">
                                <label>Nome</label>
                                <input type="text" name="name" minlength="2" maxlength="255" required>
                            </div>

                        </div>
                        <div class="form-row">
                            
                            <div class="form-col grow">
                                <label>E-mail</label>
                                <input type="email" name="email" minlength="2" maxlength="255" required>
                            </div>
                            
                            <div class="form-col grow">
                                <label>Celular</label>
                                <input type="text" name="cellphone" minlength="11" maxlength="16" required>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-row passwords">

                    <div class="form-col grow">
                        <label>Senha</label>
                        <input type="password" minlength="6" name="password" required>
                    </div>

                    <div class="form-col grow">
                        <label>Confirmar Senha</label>
                        <input type="password" minlength="6" name="password_confirm" required>
                    </div>

                </div>
            </div>
            <footer class="footer">
                <button type="button" class="btn secondary" @click="hide">Cancelar</button>
                <button type="submit" class="btn primary">Salvar</button>
            </footer>
        </form>
    </div>
</template>

<style scoped>
    .user-photo {
        justify-content: center;
        align-content: center;
        text-align: center;
        font-weight: bold;
        padding: 30px;
    }

    .user-photo img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .user-photo label {
        font-weight: normal;
        font-size: 80%;
        cursor: pointer;
    }

    .form-row.passwords {
        margin-top: -30px;
    }
</style>

<script>
    export default {
        name: "UserModal",
        emits: ['submit'],
        data() {return {
            hidden: true,
        }},
        methods: {
            show(user) {
                if(user) {
                    let form = document.querySelector("#formUser");
                    form.querySelector("*[name='password']").required = false;
                    form.querySelector("*[name='password_confirm']").required = false;
                    this.Automator.fillForm(form, user);
                }
                this.hidden = false;
            },
            hide() {
                let form = document.querySelector("#formUser");
                form.querySelector("*[name='password']").required = true;
                form.querySelector("*[name='password_confirm']").required = true;
                form.reset();
                this.hidden = true;
            },
            preSubmit(event) {
                event.preventDefault();
                let form = document.querySelector("#formUser");
                let inputCellphone = form.querySelector("*[name='cellphone']");
                inputCellphone.value = this.Formatter.onlyDigits(inputCellphone.value);
                this.$emit('submit', new FormData(form));
            }
        }
    }
</script>