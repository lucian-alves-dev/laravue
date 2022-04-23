<script>
    export default {
        name: "AppApi",
        request(method, resource, formData) {

            let url = "http://localhost:9000/" + resource;
            let paramsExtra = { method: method };

            if(method.toLowerCase() === 'get') {
                url += "?" + new URLSearchParams(formData).toString();
            } else {
                paramsExtra.body = formData;
                paramsExtra.headers = { "Content-Type": "application/json" };
            }

            return fetch(url, paramsExtra).then((response) => response.json());
        },
    };
</script>