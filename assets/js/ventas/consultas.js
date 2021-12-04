const btn = document.querySelector("#testing"),
    listVenta = document.querySelector('#tblRegistros tbody');

eventListener();

function eventListener() {
    if (btn) {
        btn.addEventListener('click', mostrar);
    }
    if (listVenta) {
        listVenta.addEventListener('click', readClickTable);
    }
}

let tableVentaRegistros;

document.addEventListener('DOMContentLoaded', function () {
    tableVentaRegistros = $('#tblRegistros').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "autoWidth": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            type: 'POST',
            url: `${GLOBAL_URL}/venta/seguimiento`,
            mimeType: 'json',
            "dataSrc": ""
        },
        "columns": [
            {"data": "fecha_llamada"},
            {"data": "fecha_seguimiento"},
            {"data": "lada_tel"},
            {"data": "nombre_cont"},
            {"data": "nombre_us"},
            {"data": "estado_ve"},
            {"data": "edit"},
            {"data": "finalizar"},
            {"data": "ingreso"}
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});


document.addEventListener('DOMContentLoaded', function () {
    tableVenta = $('#tblventaIngreso').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "autoWidth": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            type: 'POST',
            url: `${GLOBAL_URL}/venta/concretada`,
            mimeType: 'json',
            "dataSrc": ""
        },
        "columns": [
            {"data": "nombre_ip"},
            {"data": "apellido_paterno_ip"},
            {"data": "apellido_materno_ip"},
            {"data": "fecha_alta_ing"},
            {"data": "detalle"}
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});

function mostrar() {
    $.ajax({
        type: 'POST',
        url: `${GLOBAL_URL}/venta/test`,
        mimeType: 'json',
        success: function (data) {
            data.forEach(function (el, i, data) {
                const $tr = document.createElement('tr');

                const $tdFecha = document.createElement('td');
                $tdFecha.innerText = el.fecha_llamada;
                $tr.appendChild($tdFecha);

                const $tdFechaSeg = document.createElement('td');
                $tdFechaSeg.innerText = el.fecha_seguimiento;
                $tr.appendChild($tdFechaSeg);

                const $tdNombre = document.createElement('td');
                $tdNombre.innerText = el.nombre_cont;
                $tr.appendChild($tdNombre)

                const $tdAscesor = document.createElement('td');
                $tdAscesor.innerText = el.nombre_us;
                $tr.appendChild($tdAscesor)

                const tdEstado = document.createElement('td');
                tdEstado.setAttribute('class', 'estado');
                tdEstado.innerText = el.estado_ve;
                $tr.appendChild(tdEstado)

                const $tdEdit = document.createElement('td');
                const $buttonEdit = document.createElement('a');
                $buttonEdit.setAttribute('class', 'btn bg-gradient-white btn-md');
                $buttonEdit.href = `${GLOBAL_URL}/venta/editar&id=${el.id_venta}`;
                const $iconEdit = document.createElement('i');
                $iconEdit.setAttribute('class', 'fas fa-edit');
                $buttonEdit.appendChild($iconEdit);
                $tdEdit.appendChild($buttonEdit);
                $tr.appendChild($tdEdit);

                const $tdNotaSeg = document.createElement('td');
                const $buttonNota = document.createElement('a');
                $buttonNota.setAttribute('class', 'btn bg-gradient-white btn-md');
                $buttonNota.href = `${GLOBAL_URL}/venta/editar&id=${el.id_venta}`;
                const $iconNota = document.createElement('i');
                $iconNota.setAttribute('class', 'fas fa-file-alt');
                $buttonNota.appendChild($iconNota);
                $tdNotaSeg.appendChild($buttonNota);
                $tr.appendChild($tdNotaSeg);

                const $tdFinSeg = document.createElement('td');
                const $buttonFin = document.createElement('a');
                $buttonFin.setAttribute('class', 'btn bg-gradient-white btn-md finSeg');
                $buttonFin.setAttribute('data-id', el.id_venta);
                const $iconFin = document.createElement('i');
                $iconFin.setAttribute('class', 'fas fa-hourglass-end');
                $buttonFin.appendChild($iconFin);
                $tdFinSeg.appendChild($buttonFin);
                $tr.appendChild($tdFinSeg);

                const $tdIngreso = document.createElement('td');
                const $buttonIngreso = document.createElement('a');
                $buttonIngreso.setAttribute('class', 'btn bg-gradient-white btn-md');
                $buttonIngreso.href = `${GLOBAL_URL}/venta/registro&id=${el.id_venta}`;
                const $iconIngreso = document.createElement('i');
                $iconIngreso.setAttribute('class', 'fas fa-user-plus');
                $buttonIngreso.appendChild($iconIngreso);
                $tdIngreso.appendChild($buttonIngreso);
                $tr.appendChild($tdIngreso);

                $("#tblRegistros").append($tr);
            })
            /*DataTables instantiation.*/
            $("#tblRegistros").DataTable();
        },
        error: function () {
            alert('Fail!');
        }
    });
}

function readClickTable(e) {
    if (e.target.classList.contains('finSeg')) {
        id = e.target.getAttribute('data-id');

        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${GLOBAL_URL}/venta/finalizar&id=${id}`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const obj = JSON.parse(xhr.responseText);
                if (obj.res === 'true' || obj.res) {
                    tableVentaRegistros.api().ajax.reload();
                    sweetAlert('Seguimiento finalizado', 'success');
                } else {
                    sweetAlert(obj.message, 'error');
                }
            }
        }
        xhr.send();
    }
}

$('#tblRegistros').DataTable();



