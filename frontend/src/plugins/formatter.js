export default {
    install: (app) => {
        app.config.globalProperties.$formatDate = (strDate) => {
            let date = new Date(strDate);
            return date.toLocaleDateString('pt-BR', { hour: 'numeric', minute: 'numeric' });
        },
        app.config.globalProperties.$formatCellPhone = (strCellphone) => {
            return strCellphone.replace(/^(.{2})(.{4})(.*)$/, "($1) $2-$3");
        }
    }
}