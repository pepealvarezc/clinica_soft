
const consumoSustancias = document.querySelector('#consumoSustancias'),
       sustancia = document.querySelector('#sustancia'),
       inputsSustancia = document.querySelector('#inputs-sustancia'),
        listaSustancias = document.querySelector('table tbody');

eventListener();

function eventListener() {

    if (consumoSustancias) {
        consumoSustancias.addEventListener('submit', readForm);
    }

    if(sustancia){
        sustancia.addEventListener('click', sustanciaSelect);
    }
}

// read form send bd
function readForm(e) {
    e.preventDefault();

    //se obtiene el valor de el radio seleccionado
    const rbs = document.querySelectorAll('input[name="customRadio"]');
    let consumo;
    for(const rb of rbs ){
        if(rb.checked){
            consumo = rb.value;
            break;
        }
    }

    const sustancia_id = document.querySelector('#sustancia').value,
        formaConsumo = document.querySelector('#forma-consumo').value,
        consumoFrecuencia = document.querySelector('#consumo-frecuencia').value,
        inicioConsumo = document.querySelector('#inicio-consumo').value,
        cantidad = document.querySelector('#cantidad').value,
        paciente_id = document.querySelector('#paciente_id').value,
        action = 'create';

    const data = new FormData();
    data.append('sustancia_id', sustancia_id);
    data.append('formaConsumo', formaConsumo);
    data.append('consumoFrecuencia', consumoFrecuencia);
    data.append('inicioConsumo', inicioConsumo);
    data.append('consumo', consumo);
    data.append('cantidad', cantidad);
    data.append('paciente_id', paciente_id);
    data.append('action', action);

    if(sustancia == '' || formaConsumo == ''){
        sweetAlert('Favor de llenar los campos requeridos', 'error');
    }else if(action === 'create'){
        sendDb(data);
    }else{
        editData(data);
    }
}

function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/consumoSustancias/save`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.res === 'true') {
                sweetAlert('Exitoso', 'success');
                consumoSustancias.reset();

                const newProduct = document.createElement('tr');
                newProduct.innerHTML = `
                <td>${response.sus}</td>
                <td>${response.consumo}</td>
                <td>${response.forma}</td>
                <td>${response.frecuencia}</td>
                <td>${response.cantidad}</td>
                <td>${response.edad}</td>
                `;

                listaSustancias.insertBefore(newProduct, listaSustancias.childNodes[0]);
            }
        }
    }
    xhr.send(data)
}

// se edita el usuario
function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/usuario/save`);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.result === 'true') {
                alert('El usuario se edito correctamente');
            }
        }
    }
    xhr.send(data)
}

function sustanciaSelect(e) {
    //const id = e.target.value;
    if(e.target.classList.contains('change')){
        const id = e.target.value;
        const id_pac = e.target.getAttribute('data-id');

        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${GLOBAL_URL}/consumoSustancias/check&id=${id}&id_pac=${id_pac}`, true);

        xhr.onload = function (){
            if(this.status === 200){
                const response = JSON.parse(xhr.responseText);
                if(response.res == 'false'){
                    inputsSustancia.classList.remove('none-inputs');
                    inputsSustancia.classList.add('show-inputs');
                }else{
                    inputsSustancia.classList.add('none-inputs');
                }
            }
        }
        xhr.send();
    }

}


