window.addEventListener('load', init);
const button = document.querySelector('#filterClick')
let filter = document.createElement('a');

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

        filter.classList.add('filter_button', 'filter_clicked');
        if (!filter.classList.contains('filter_clicked')) {
            return;
        }

        filter.setAttribute('href','https://www.instagram.com/ar/452675255996071/?ch=ZTlhODRlYTNjYzc0NTFjMTdiNGMyNjRiOTRlYzljZWM%3D');
        filter.innerHTML = 'Click here';
        button.appendChild(filter);

        //Remove classlist to not allow more clicks
        filter.classList.remove('filter_clicked');
    }
    else if (currentHeight == 700) {
        button.style.height = "270px";
        filter.style.padding = "0px";
        filter.style.margin = "0";
    }
}

