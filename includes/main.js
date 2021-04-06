window.addEventListener('load', init);
const button = document.querySelector('#filterClick')

function init() {
    button.addEventListener('click', filterClickHandler);
}

function filterClickHandler() {
    let currentHeight = button.clientHeight;
    let filterText = document.querySelector('#filterText');

    console.log(currentHeight);
    if (currentHeight == 270) {
        filterText.innerHTML = 'Er is een filter aanwezig!';

        button.style.height = "700px";
        button.style.backgroundColor = '#C3CBE8';
        filterText.style.fontSize = '70px';
        filterText.style.color = 'white';
    }
    else if (currentHeight == 700) {
        button.style.height = "270px";
    }
}

