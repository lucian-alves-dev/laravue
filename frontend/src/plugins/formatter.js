class Formatter
{
    static date(strDate)
    {
        let date = new Date(strDate);
        return date.toLocaleDateString('pt-BR', { hour: 'numeric', minute: 'numeric' });
    }

    static cellphone(strCellphone)
    {
        if(strCellphone === null || strCellphone === undefined) return "";
        return strCellphone.replace(/^(.{2})(.{5})(.*)$/, "($1) $2-$3");
    }

    static onlyDigits(string)
    {
        return string.replace(/[^0-9]/g, '');
    }
}

export default Formatter;