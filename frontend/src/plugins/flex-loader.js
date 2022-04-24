class FlexLoader
{
    static show(msg)
    {
        let flexLoaderOverlay = document.createElement('div');
        flexLoaderOverlay.classList.add("flex-loader-overlay");

        let flexLoaderSpinner = document.createElement('div');
        flexLoaderSpinner.classList.add("flex-loader-spinner");

        let flexLoaderText = document.createElement('div');
        flexLoaderText.classList.add("flex-loader-text");
        flexLoaderText.innerHTML = msg ? msg : "Carregando...";

        flexLoaderOverlay.appendChild(flexLoaderSpinner);
        flexLoaderOverlay.appendChild(flexLoaderText);
        document.body.appendChild(flexLoaderOverlay);
    }

    static hide()
    {
        let flexLoaderOverlay = document.querySelector('.flex-loader-overlay');
        if(flexLoaderOverlay) flexLoaderOverlay.parentNode.removeChild(flexLoaderOverlay);
    }

    static hideAll()
    {
        for(let flexLoaderOverlay of document.querySelectorAll('.flex-loader-overlay')) {
            flexLoaderOverlay.parentNode.removeChild(flexLoaderOverlay);
        }
    }

    static showInside(element)
    {
        if(typeof element === 'string') element = document.querySelector(element);
        element.style.position = 'relative';

        let flexLoaderInsideOverlay = document.createElement("div");
        flexLoaderInsideOverlay.classList.add("flex-loader-inside-overlay");

        let flexLoaderSpinner = document.createElement("div");
        flexLoaderSpinner.classList.add("flex-loader-spinner");

        flexLoaderInsideOverlay.appendChild(flexLoaderSpinner);
        element.appendChild(flexLoaderInsideOverlay);
    }

    static hideInside(element)
    {
        if(typeof element === 'string') element = document.querySelector(element);
        if(!element) return false;

        let flexLoaderInsideOverlay = element.querySelector(".flex-loader-inside-overlay");
        if(!flexLoaderInsideOverlay) return false;

        flexLoaderInsideOverlay.parentNode.removeChild(flexLoaderInsideOverlay);
    }
}

export default FlexLoader;