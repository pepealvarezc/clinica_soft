const contactosForm = document.querySelector('#cpForm'),
    contactosFormEdit = document.querySelector('#cpEdit'),
    listContactos = document.querySelector('#listContactos, tbody');

eventListener();

//se comprueba si el paciente ya fue creado, si no hay paciente creado se visualiza
//la data de la localstorage
const idPaciente = document.querySelector('#paciente_id').value;
if(!parseInt(idPaciente)) {
    listData();
}

function eventListener() {
    if (contactosForm) {
        contactosForm.addEventListener('submit', readForm);
    }
    if (listContactos) {
        listContactos.addEventListener('click', readList);
    }
    if (contactosFormEdit) {
        contactosFormEdit.addEventListener('click', edit);
    }
}

function readForm(e) {
    e.preventDefault();
    const nombre = document.querySelector('#nombreCp').value,
        telefono = document.querySelector('#telCp').value,
        correo = document.querySelector('#correoCp').value,
        parentesco = document.querySelector('#parentescoCp').value;

    if (nombre === '' || parentesco === '') {
        sweetAlert('Ingrese los datos requedidos', 'error');
    } else {

        let contacto = {
            nombre,
            telefono,
            correo,
            parentesco
        };

        if (localStorage.getItem("db") === null) {
            let data = [];
            data.push(contacto);
            localStorage.setItem("db", JSON.stringify(data));
        } else {
            let data = JSON.parse(localStorage.getItem("db"));
            data.push(contacto);
            localStorage.setItem("db", JSON.stringify(data));
        }
        listData();
        contactosForm.reset();
    }
}

function listData() {
    let data = JSON.parse(localStorage.getItem("db"));
    document.querySelector('#contactosPaciente').innerHTML = "";

    if (data) {
        for (let i = 0; i < data.length; i++) {
            let nombre = data[i].nombre;
            let telefono = data[i].telefono;
            let correo = data[i].correo;
            let parentesco = data[i].parentesco;

            const $tbody = document.querySelector('#contactosPaciente');
            const $tr = document.createElement('tr');

            const $tdNombre = document.createElement('td');
            $tdNombre.setAttribute('class', 'nombre-cp');
            $tdNombre.innerText = nombre;
            $tr.appendChild($tdNombre);

            const $tdTel = document.createElement('td');
            $tdTel.setAttribute('class', 'tel-cp');
            $tdTel.innerText = telefono;
            $tr.appendChild($tdTel);

            const $tdContacto = document.createElement('td');
            $tdContacto.setAttribute('class', 'contacto-cp');
            $tdContacto.innerText = correo;
            $tr.appendChild($tdContacto);

            const $tdParentesco = document.createElement('td');
            $tdParentesco.setAttribute('class', 'parentesco-cp');
            $tdParentesco.innerText = parentesco;
            $tr.appendChild($tdParentesco);

            //boton editar
            const $tdButtonEdit = document.createElement('td');
            const $buttonEdit = document.createElement('a');
            $buttonEdit.setAttribute('type', 'button');
            $buttonEdit.setAttribute('class', 'btn btn-primary btn-sm btn-flat b-edit');
            $buttonEdit.setAttribute('data-id', `${i}`);
            $buttonEdit.setAttribute('data-toggle', 'modal');
            $buttonEdit.setAttribute('data-target', '#modalEdit');

            const $iconEdit = document.createElement('i');
            $iconEdit.setAttribute('class', 'fas fa-user-edit b-edit');
            $iconEdit.setAttribute('data-id', `${i}`);
            $buttonEdit.appendChild($iconEdit);
            $tdButtonEdit.appendChild($buttonEdit);
            $tr.appendChild($tdButtonEdit);

            const $tdButtonDelete = document.createElement('td');
            const $ButtonDelete = document.createElement('a');
            $ButtonDelete.setAttribute('type', 'button');
            $ButtonDelete.setAttribute('data-id', `${i}`);
            $ButtonDelete.setAttribute('class', 'btn btn-danger btn-sm btn-flat b-delete');

            const $iconDelete = document.createElement('i');
            $iconDelete.setAttribute('class', 'far fa-trash-alt b-delete');
            $iconDelete.setAttribute('data-id', `${i}`);
            $ButtonDelete.appendChild($iconDelete);
            $tdButtonDelete.appendChild($ButtonDelete);
            $tr.appendChild($tdButtonDelete);

            $tbody.appendChild($tr);
        }
    }
}

function readList(e) {
    if (e.target.classList.contains('b-edit')) {
        const idContact = document.querySelector('#idContact');
        let id = e.target.getAttribute('data-id');

        const nombre = document.querySelector('#nombreEdit'),
            tel = document.querySelector('#telEdit'),
            correo = document.querySelector('#correoEdit'),
            parentesco = document.querySelector('#parentescoEdit');

        let data = JSON.parse(localStorage.getItem("db"));
        idContact.value = `${id}`;
        nombre.value = `${data[id].nombre}`;
        tel.value = `${data[id].telefono}`;
        correo.value = `${data[id].correo}`;
        parentesco.value = `${data[id].parentesco}`;
    }

    if (e.target.classList.contains('b-delete')) {
        let id = e.target.getAttribute('data-id');
        let data = JSON.parse(localStorage.getItem("db"));
        data.splice(id, 1);
        localStorage.setItem("db", JSON.stringify(data));
        listData();
    }
}

function edit(e) {
    const id = document.querySelector('#idContact').value;
    let data = JSON.parse(localStorage.getItem("db"));

    if (e.target.classList.contains('btnAction')) {
        data[id].nombre = document.querySelector('#nombreEdit').value,
            data[id].telefono = document.querySelector('#telEdit').value,
            data[id].correo = document.querySelector('#correoEdit').value,
            data[id].parentesco = document.querySelector('#parentescoEdit').value;
        localStorage.setItem("db", JSON.stringify(data));
        sweetAlert('Actualizado correctamente !', 'success');
    }
    listData();
}




