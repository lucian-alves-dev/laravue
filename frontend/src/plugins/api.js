class Api
{
    static request(method, resource, formData)
    {
        let url = this.baseUrl + resource;
        let paramsExtra = { method: method };

        if(method.toLowerCase() === 'get') {
            url += "?" + new URLSearchParams(formData).toString();
        }

        if(formData && method.toLowerCase() !== 'get') {
            paramsExtra.body = JSON.stringify(Object.fromEntries(formData));
            paramsExtra.headers = { "Content-Type": "application/json" };
        }

        return fetch(url, paramsExtra).then((response) => response.json());
    }
    static fileUpload(resource, formData)
    {
        return fetch(this.baseUrl + resource, { method: 'post', body: formData })
        .then((response) => response.json());
    }
}
Api.baseUrl = "http://localhost:9000/";

export default Api;