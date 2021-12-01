const formVenta = document.querySelector("#rgVenta"),
    formNota = document.querySelector("#fmNota");

//Fecha
const fechaNota = new Date();
//dia
let day = fechaNota.getDate();
//mes
let month = fechaNota.getMonth() + 1;
month < 10 ? month = '0' + month : month;
//año
let year = fechaNota.getFullYear();
// full date
//let fechaNow = day + "/" + month + "/" + year + " ";
let fechaNow = year + "-" + month + "-" + day + " "

//Hora
let date = new Date();
let typeHour;
hours = date.getHours();
min = date.getMinutes();
seconds = date.getSeconds();
hours < 10 ? hours = 0 + hours : hours;
min < 10 ? min = '0' + min : min;
if (seconds < 10) seconds = '0' + seconds;
//hours >= 12 ? typeHour = 'PM' : typeHour = 'AM';
let hour = " " + hours + ":" + min + ":" + seconds;


eventListener();

function eventListener() {
    if (formVenta) {
        formVenta.addEventListener('submit', readForm);
    }
    if (formNota) {
        formNota.addEventListener('submit', readFormNota);
    }
}

function readForm(e) {
    e.preventDefault();
    const ladaTel = document.querySelector("#ladaTel").value,
        razonLlamada = document.querySelector("#razon").value,
        nombre = document.querySelector("#nombre").value,
        correo = document.querySelector("#correo").value,
        parentesco = document.querySelector('#parentesco').value,
        consumo = document.querySelector('#consumo').value,
        edad = document.querySelector('#edad').value,
        aceptada = document.querySelector('#acepta').value,
        detalles = document.querySelector('#detalles').value,
        medioEnvio = document.querySelector('#medioEnvio').value,
        medioEntero = document.querySelector('#medioEntero').value,
        fechaSeg = document.querySelector('#fechaSeg').value,
        calLLamada = document.querySelector('#calLLamada').value,
        action = document.querySelector('#action').value;

    let dataNotes = [];

    document.querySelectorAll('.list-notes #listNotes .direct-chat-msg').forEach(function (e) {
        let objNotes = {
            nota: e.querySelector('.direct-chat-text').innerText
        };
        dataNotes.push(objNotes);
    });

    //Se convierte el arreglo en json
    let arrData = JSON.stringify(dataNotes);

    const data = new FormData();
    data.append('ladaTel', ladaTel);
    data.append('razonLlamada', razonLlamada);
    data.append('nombre', nombre);
    data.append('correo', correo);
    data.append('parentesco', parentesco);
    data.append('consumo', consumo);
    data.append('edad', edad);
    data.append('aceptada', aceptada);
    data.append('detalles', detalles);
    data.append('medioEnvio', medioEnvio);
    data.append('medioEntero', medioEntero);
    data.append('fechaSeg', fechaSeg);
    data.append('action', action);
    data.append('calLLamada', calLLamada);
    data.append('arrData', arrData);

    //Si confima la fecha de seguimiento vacia va poder ingresar la informacion
    if (razonLlamada === 'Prospecto' && fechaSeg === "") {
        const confirmFechaSeg = confirm('Deseas ingresar fecha de seguimiento vacia');
        if (confirmFechaSeg) {
            if (action === 'create') {
                sendDb(data);
            } else {
                const ventaId = document.querySelector('#ventaId').value;
                data.append('ventaId', ventaId);
                editDb(data);
            }
        } else {
            e.preventDefault();
        }
    } else if (action === 'create') {
        sendDb(data);
    } else {
        const ventaId = document.querySelector('#ventaId').value;
        data.append('ventaId', ventaId);
        editDb(data);
    }
}

//crear
function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/venta/save`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.res === 'true') {

                //Variable para el numero traido del campo de llamada
                let numberPhone = response.phone;

                //Se crea boton de whatsapp
                const $divSocialMedia = document.querySelector('#btns-social-media');
                const buttonWhatsapp = document.createElement('a');
                buttonWhatsapp.href = `https://api.whatsapp.com/send?phone=+${numberPhone}&text=`;
                buttonWhatsapp.setAttribute('class', 'float');
                buttonWhatsapp.setAttribute('target', '_blank');

                const iconWhatsapp = document.createElement('i');
                iconWhatsapp.setAttribute('class', 'fab fa-whatsapp-square icons-whatsapp-email');

                buttonWhatsapp.appendChild(iconWhatsapp);
                $divSocialMedia.appendChild(buttonWhatsapp);

                sweetAlert('Generado correctamente', 'success');
                formVenta.reset();
                //Se eliminan las notas despues de ser ingresado el registro
                const $nodoNotas = document.querySelector('#listNotes');
                while ($nodoNotas.firstChild) {
                    $nodoNotas.removeChild($nodoNotas.firstChild);
                }
            }

        }
    }
    xhr.send(data);
}

//editar
function editDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/venta/save`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            response.res === 'true' ? sweetAlert('Generado correctamente', 'success') : null;
        }
    }
    xhr.send(data);
}

// leer las notas enviadas desde el formulario
function readFormNota(e) {
    e.preventDefault();
    const notaSeg = document.querySelector('#notaSeg').value,
        nombreUs = document.querySelector('#nombreUs').value,
        idVenta = document.querySelector('#ventaId');
    if (notaSeg === '') {
        sweetAlert('Nota vacia', 'error');
    } else {
        //contenedor padre
        const listNotes = document.querySelector('.list-notes #listNotes');

        //Cotenedor del elemento padre notas
        const $NodeNote = document.createElement('div');
        $NodeNote.setAttribute('class', 'direct-chat-msg');

        //Contenedor hijo de nombre y la fecha
        const $NodeNameDate = document.createElement('div');
        $NodeNameDate.setAttribute('class', 'direct-chat-infos clearfix');
        $NodeNote.appendChild($NodeNameDate);

        //span nombre y fecha
        const $spanName = document.createElement('span');
        $spanName.setAttribute('class', 'direct-chat-name float-left');
        $spanName.innerText = nombreUs;
        $NodeNameDate.appendChild($spanName);
        const $spanDate = document.createElement('span');
        $spanDate.setAttribute('class', 'direct-chat-timestamp float-right');
        $spanDate.innerText = fechaNow + "|" + hour;
        $NodeNameDate.appendChild($spanDate);

        //nota
        const $divNota = document.createElement('div');
        $divNota.setAttribute('class', 'direct-chat-text');
        $divNota.innerText = notaSeg;
        $NodeNote.appendChild($divNota);

        //listNotes.insertAfter($NodeNote, listNotes.childNodes[0]);

        listNotes.insertAdjacentElement('beforeend', $NodeNote);
        formNota.reset();

        if (parseInt(idVenta.value)) {
            const id = idVenta.value;
            const data = new FormData();
            data.append('notaSeg', notaSeg);
            data.append('id', id);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', `${GLOBAL_URL}/venta/saveNota`, true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const res = JSON.parse(xhr.responseText);
                    console.log(res);
                }
            }
            xhr.send(data);
        }

    }
}


