const modalPersonas = document.querySelector('#rgParentes');
/*listUsers = document.querySelector('#list tbody'),
stateUs = document.querySelector('#card-body .card-body');*/

eventListener();

function eventListener() {
    if (modalPersonas) {
        modalPersonas.addEventListener('submit', readModal);
    }
    /*
    if (listUsers) {
        listUsers.addEventListener('click', readListUsers);
    }
    if (stateUs) {
        stateUs.addEventListener('change', stateUsers);
    }
    /*/
}

// leer Modal
function readModal(e) {
    e.preventDefault();

    const nombre_par = document.querySelector('#nombre_par').value,
        telefono_par = document.querySelector('#telefono_par').value,
        parentesco = document.querySelector('#parentesco').value,
        paciente_id = document.querySelector('#paciente_id').value,
        action = 'create';

    const data = new FormData();
    data.append("nombre_par", nombre_par);
    data.append("telefono_par", telefono_par);
    data.append("parentesco", parentesco);
    data.append("paciente_id", paciente_id);
    data.append("action", action);

    console.log(...data);

    if (action === 'create') {
        sendDb(data);
    } else {
        editData(data);
    }

    // Guardar
    function sendDb() {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', `${GLOBAL_URL}/pacientePersona/save`, true);

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
}
