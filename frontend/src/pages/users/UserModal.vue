<template>
    <div v-show="visible" class="flex-modal-overlay">
        <form id="formUser" class="flex-modal" @submit="preSubmit($event)">
            <header class="header">
                <h1 class="title">Cadastro de Usuário</h1>
                <button type="button" class="btn-close" @click="hide">&#10005;</button>
            </header>
            <div class="body">

                <input type="hidden" name="id" :value="user.id">

                <div class="row center">
                    
                    <photo-picker max-size="2MB" :img="this.Api.baseUrl + (user.photo || 'files/user/nophoto.svg')"></photo-picker>

                    <div class="col grow">
                        <div class="form-row">
                            
                            <div class="form-col grow">
                                <label>Nome</label>
                                <input type="text" name="name" minlength="2" maxlength="255" :value="user.name" required>
                            </div>

                        </div>
                        <div class="form-row">
                            
                            <div class="form-col grow">
                                <label>E-mail</label>
                                <input type="email" name="email" minlength="2" maxlength="255" :value="user.email" required>
                            </div>
                            
                            <div class="form-col grow">
                                <label>Celular</label>
                                <input type="text" name="cellphone" minlength="11" maxlength="16" :value="user.cellphone" required>
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
    .form-row.passwords {
        margin-top: -30px;
    }
</style>

<script>
    import PhotoPicker from "@/components/PhotoPicker.vue";

    export default {
        name: "UserModal",
        components: {
            PhotoPicker,
        },
        emits: ['submit'],
        data() {return {
            visible: false,
            user: Object,
        }},
        methods: {
            show(user) {
                if(user) {
                    let form = this.$el.querySelector("#formUser");
                    form.querySelector("*[name='password']").required = false;
                    form.querySelector("*[name='password_confirm']").required = false;
                    this.user = user;
                }
                this.visible = true;
            },
            hide() {
                this.visible = false;
                let form = this.$el.querySelector("#formUser");
                form.querySelector("*[name='password']").required = true;
                form.querySelector("*[name='password_confirm']").required = true;
                this.user = {};
            },
            preSubmit(event) {
                event.preventDefault();
                let form = this.$el.querySelector("#formUser");
                let inputCellphone = form.querySelector("*[name='cellphone']");
                inputCellphone.value = this.Formatter.onlyDigits(inputCellphone.value);
                this.$emit('submit', new FormData(form));
            }
        }
    }
</script>