const selectIngreso = document.querySelector('#ingreso');

eventListener()

function eventListener() {
    if (selectIngreso) {
        selectIngreso.addEventListener('change', actionSelectIngreso);
    }
}

function actionSelectIngreso(e) {
    //id ingreso
    const id = e.target.value;

    const xhr = new XMLHttpRequest();

    xhr.open('GET', `${GLOBAL_URL}/paciente/generatePdf&id=${id}`, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const res = JSON.parse(xhr.responseText);
            const idI = res.idIngresoPaciente;
            const idP = res.idPaciente;

            const $contButtonPdf = document.querySelector('#contPdf');

            const $buttonPdf = document.createElement('a');
            $buttonPdf.setAttribute('type', 'button');
            $buttonPdf.setAttribute('class', 'btn btn-danger btn-flat');
            $buttonPdf.setAttribute('target', '_blank');
            $buttonPdf.href = `${GLOBAL_URL}/docs/contrato_ingreso_esp.php?&idP=${idP}&idI=${idI}`;

            const $iconPdf = document.createElement('i');
            $iconPdf.setAttribute('class', 'fas fa-file-pdf');
            $buttonPdf.appendChild($iconPdf);
            $contButtonPdf.appendChild($buttonPdf);
        }
    }
    xhr.send();
}


$(function () {
    $('.select2').select2()
});

$('.select2').change(function (e) {
    if (e.target.classList.contains('select2')) {

        const res = confirm('Deseas asignar el usuario');

        if (res) {
            const rol = $('#rol').val();
            //const id_us = $('#usuario_id').val();
            const id_pac = $('#paciente_id').val();


            $.ajax({
                url: `${GLOBAL_URL}/asignacionPaciente/insert`,
                type: 'POST',
                dataType: 'json',
                data: {
                    rol,
                    id_pac
                }
            }).done(
                function (data) {
                    if (data.result === 'true') {
                        sweetAlert('Paciente asignado', 'success');
                        $('#ajax-data').append(data.nombre);
                    } else {
                        sweetAlert('El paciente ya ah sido asignado', 'error');
                    }
                }
            );
        }
    }
});


