class Automator
{
    static fillForm(form, data)
    {
        if(typeof form === 'string') form = document.querySelector(form);
        if(! form || typeof data !== 'object') return false;

        for(let [key, value] of Object.entries(data)) {
            let input = form.querySelector(`*[name='${key}']`);
            if(! input) continue;
            input.value = value;
        }
    }
}

export default Automator;