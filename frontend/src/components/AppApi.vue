<script>
    export default {
        name: "AppApi",
        request(method, resource, formData) {

            let url = "http://localhost:9000/" + resource;
            let paramsExtra = { method: method };

            if(method.toLowerCase() === 'get') {
                console.log(Object.fromEntries(formData));
                url += "?" + new URLSearchParams(formData).toString();
            }

            if(formData && method.toLowerCase() !== 'get') {
                paramsExtra.body = JSON.stringify(Object.fromEntries(formData));
                paramsExtra.headers = { "Content-Type": "application/json" };
            }

            console.log(url, paramsExtra);
            return fetch(url, paramsExtra).then((response) => response.json());
        },
    };
</script>