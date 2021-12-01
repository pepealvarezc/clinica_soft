const formUsuario = document.querySelector('#rgUsuario'),
    listUsers = document.querySelector('#tblRegistros tbody'),
    userPass = document.querySelector('#userPass'),
    stateUs = document.querySelector('#card-body .card-body'),
    login = document.querySelector('#login-form');

const mgError = 'Favor de llenar los campos requeridos',
    resError = 'error',
    mgTrue = 'Generado correctamente',
    resTrue = 'success',
    mgPass = 'Las controaseñas no coinciden',
    mgPassTrue = 'Contraseña actualizada correctamente';

eventListener();


function eventListener() {
    if (formUsuario) {
        formUsuario.addEventListener('submit', readForm);
    }
    if (listUsers) {
        listUsers.addEventListener('click', readListUsers);
    }
    if (userPass) {
        userPass.addEventListener('submit', readPass);
    }
    if (stateUs) {
        stateUs.addEventListener('change', stateUsers);
    }
    if (login) {
        login.addEventListener('submit', readFormLogin);
    }
}

//Se lee el formalrio y se delimita si se va editar o crear el usuario 
function readForm(e) {
    e.preventDefault();

    const nombre = document.querySelector('#nombre').value,
        apellidos = document.querySelector('#apellidos').value,
        rol = document.querySelector('#rol').value,
        email = document.querySelector('#email').value,
        entidad_id = document.querySelector('#entidad').value,
        action = document.querySelector('#action').value;

    const data = new FormData();
    data.append("nombre", nombre);
    data.append("apellidos", apellidos);
    data.append("rol", rol);
    data.append("email", email);
    data.append("entidad_id", entidad_id);
    data.append("action", action);

    //console.log(...data);

    if (nombre === '' || apellidos === '' || email === '' || entidad_id === '') {

        sweetAlert(mgError, resError);

    } else if (action === 'create') {
        const pass = document.querySelector('#password').value;
        if (pass === '' && rol === '') {
            sweetAlert(mgError, resError);
        } else {
            data.append("pass", pass);
            sendDb(data);
        }
    } else if (rol === '') {
        sweetAlert(mgError, resError);
    } else {
        const usuario_id = document.querySelector('#usuario_id').value;
        data.append("usuario_id", usuario_id);
        editData(data);
    }
}

// Se detecta el click en cualquier accion de la tabla usuario
function readListUsers(e) {
    //eliminar usuario
    if (e.target.classList.contains('delete_us')) {
        id = e.target.getAttribute('data-id');

        const respuesta = confirm('¿ Estas seguro de eliminar al usuario ?');

        if (respuesta) {
            const xhr = new XMLHttpRequest();

            xhr.open('GET', `${GLOBAL_URL}/usuario/delete&id=${id}`, true)

            xhr.onload = function () {
                const rs = JSON.parse(xhr.responseText);

                if (rs.result === 'success') {
                    e.target.parentElement.parentElement.remove();
                }
            }
            xhr.send();
        }
    }
}

// se crea el usuario
function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/usuario/save`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.result === 'true') {

                sweetAlert(mgTrue, resTrue);
                formUsuario.reset();

            }
        }
    }
    xhr.send(data)
}

// se edita el usuario
function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/usuario/save`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.result === 'true') {

                sweetAlert(mgTrue, resTrue);

            }
        }
    }
    xhr.send(data)
}

// funcion para cambiar el pass del usuario 
function readPass(e) {
    e.preventDefault();

    const pass = document.querySelector('#pass').value,
        newpass = document.querySelector('#newpass').value,
        idUser = document.querySelector('#idUser').value;

    const data = new FormData();
    data.append("pass", pass);
    data.append("newpass", newpass);
    data.append("idUser", idUser);

    if (pass === '' || newpass === '') {
        sweetAlert(mgError, resError);
    } else if (pass != newpass) {
        sweetAlert(mgPass, resError);
    } else {
        const xhr = new XMLHttpRequest();

        xhr.open("POST", `${GLOBAL_URL}/usuario/changePassword`, true);

        xhr.onload = function () {
            if (this.status === 200) {
                const result = JSON.parse(xhr.responseText);
                if (result.result === 'true') {

                    sweetAlert(mgPassTrue, resTrue);
                }
            }
        }
        xhr.send(data);
    }
}

// Funcion para cambiar el estado del usuario si esta activo o inactivo
function stateUsers(e) {
    const state = (e.target);
    const id = (e.target.getAttribute('data-v'));

    if (!state.checked) {
        const res = confirm('¿ Estas seguro que deseas inabilitarlo ?');

        if (res) {
            const xhr = new XMLHttpRequest();

            const status = 0;

            const data = new FormData();
            data.append('status', status);
            data.append('id', id);

            xhr.open("POST", `${GLOBAL_URL}/usuario/estado`, true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.result === 'true') {
                        const status_input = document.querySelector('#estado_us');
                        status_input.value = result.status;
                    }
                }
            }
            xhr.send(data);
        }
    } else {
        const res = confirm('¿ Estas seguro que deseas habilitarlo ?');
        if (res) {
            const xhr = new XMLHttpRequest();

            const status = 1;

            const data = new FormData();
            data.append('status', status);
            data.append('id', id);

            xhr.open("POST", `${GLOBAL_URL}/usuario/estado`, true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.result === 'true') {
                        const status_input = document.querySelector('#estado_us');
                        status_input.value = result.status;
                    }
                }
            }
            xhr.send(data);
        }
    }
}

/* Validaciones para el logeo */
function readFormLogin(e) {
    e.preventDefault();

    const email = document.querySelector('#email').value,
        pass = document.querySelector('#pass').value;

    const data = new FormData();
    data.append('email', email);
    data.append('pass', pass);

    const xhr = new XMLHttpRequest();

    xhr.open('POST', `${GLOBAL_URL}/usuario/login`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const res = JSON.parse(xhr.responseText);
            if (res) {
                if (res.res === 'true') {
                    if (res.data.rol === 'ventas') {
                        location.replace("http://localhost/clinica_soft/venta/index");
                    } else {
                        location.replace("http://localhost/clinica_soft/dashboard/index");
                    }
                } else {
                    sweetAlert('Error de usuario y/o contraseña favor de contactar a su administrador', 'error');
                }
            }else {
                sweetAlert('El usuario no existe, favor de contactar a su administrador !', 'error');
            }
        }
    }
    xhr.send(data);

}









