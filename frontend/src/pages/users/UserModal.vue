<template>
    <div v-show="visible" class="flex-modal-overlay">
        <form id="formUser" class="flex-modal" @submit="preSubmit($event)">
            <header class="header">
                <h1 class="title">Cadastro de Usuário</h1>
                <button type="button" class="btn-close" @click="hide">
                    &#10005;
                </button>
            </header>
            <div class="body">
                <input type="hidden" name="id" :value="user.id" />

                <div class="row center">
                    <photo-picker
                        max-size="2MB"
                        :img="user.photo"
                    ></photo-picker>

                    <div class="col grow">
                        <div class="form-row">
                            <div class="form-col grow">
                                <label>Nome</label>
                                <input
                                    type="text"
                                    name="name"
                                    minlength="2"
                                    maxlength="255"
                                    :value="user.name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col grow">
                                <label>E-mail</label>
                                <input
                                    type="email"
                                    name="email"
                                    minlength="2"
                                    maxlength="255"
                                    :value="user.email"
                                    required
                                />
                            </div>

                            <div class="form-col grow">
                                <label>Celular</label>
                                <input
                                    type="text"
                                    name="cellphone"
                                    pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"
                                    title="Celular precisa estar no formato (99) 9999-9999"
                                    :value="this.Formatter.cellphone(user.cellphone)"
                                    required
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row passwords">
                    <div class="form-col grow">
                        <label>Senha</label>
                        <input
                            type="password"
                            minlength="6"
                            name="password"
                            required
                        />
                    </div>

                    <div class="form-col grow">
                        <label>Confirmar Senha</label>
                        <input
                            type="password"
                            minlength="6"
                            name="password_confirm"
                            required
                        />
                    </div>
                </div>
            </div>
            <footer class="footer">
                <button type="button" class="btn secondary" @click="hide">
                    Cancelar
                </button>
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
        emits: ["submit"],
        data() {
            return {
                visible: false,
                user: {},
            };
        },
        methods: {
            show(user) {
                this.user = {};

                let form = this.$el.querySelector("#formUser");
                form.reset();
                form.querySelector("*[name='password']").required = true;
                form.querySelector("*[name='password_confirm']").required = true;

                if (user) {
                    form.querySelector("*[name='password']").required = false;
                    form.querySelector(
                        "*[name='password_confirm']"
                    ).required = false;
                    this.user = user;
                }

                this.visible = true;
            },
            hide() {
                this.visible = false;
            },
            preSubmit(event) {
                event.preventDefault();
                let form = this.$el.querySelector("#formUser");
                let formData = new FormData(form);
                formData.set('cellphone', this.Formatter.onlyDigits(formData.get('cellphone')));
                this.$emit("submit", formData);
            },
        },
    };
</script>