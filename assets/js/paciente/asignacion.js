const listAsignacion = document.querySelector('#list-asigns .card-asigns');

eventListener();

function eventListener() {
    if(listAsignacion){
        listAsignacion.addEventListener('click', actionRead);
    }
}

function actionRead(e) {
   const id = e.target.getAttribute('data_id');

    if(e.target.classList.contains('btn-delete-asign')){
        const res = confirm('Estas seguro que deseas eliminarlo');
        if(res){
            const xhr = new XMLHttpRequest();

            xhr.open('GET', `${GLOBAL_URL}/asignacionPaciente/delete&id${id}`, true);

            xhr.send();
        }
    }
}