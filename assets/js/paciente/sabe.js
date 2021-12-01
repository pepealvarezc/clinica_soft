document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        processing: true,
        serverSide: true,
        type: 'POST',
        url: 'http://localhost/clinica_soft/venta/test',
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
                tdEstado.innerText = el.estado_ve === '1' ? 'Activa' : 'Inactiva';
                $tr.appendChild(tdEstado)

                const $tdEdit = document.createElement('td');
                const $buttonEdit = document.createElement('a');
                $buttonEdit.setAttribute('class', 'btn bg-gradient-white btn-md');
                $buttonEdit.href = `http://localhost/clinica_soft/venta/editar&id=${el.id_venta}`;
                const $iconEdit = document.createElement('i');
                $iconEdit.setAttribute('class', 'fas fa-edit');
                $buttonEdit.appendChild($iconEdit);
                $tdEdit.appendChild($buttonEdit);
                $tr.appendChild($tdEdit);

                const $tdNotaSeg = document.createElement('td');
                const $buttonNota = document.createElement('a');
                $buttonNota.setAttribute('class', 'btn bg-gradient-white btn-md');
                $buttonNota.href = `http://localhost/clinica_soft/venta/editar&id=${el.id_venta}`;
                const $iconNota = document.createElement('i');
                $iconNota.setAttribute('class', 'fas fa-file-alt');
                $buttonNota.appendChild($iconNota);
                $tdNotaSeg.appendChild($buttonNota);
                $tr.appendChild($tdNotaSeg);

                const $tdFinSeg = document.createElement('td');
                const $buttonFin = document.createElement('a');
                $buttonFin.setAttribute('class', 'btn bg-gradient-white btn-md finSeg');
                $buttonFin.setAttribute('data-id', el.id_venta);
                //$buttonFin.href = `http://localhost/clinica_soft/venta/finalizar&id=${el.id_venta}`;
                const $iconFin = document.createElement('i');
                $iconFin.setAttribute('class', 'fas fa-hourglass-end finSeg');
                $iconFin.setAttribute('data-id', el.id_venta);
                $buttonFin.appendChild($iconFin);
                $tdFinSeg.appendChild($buttonFin);
                $tr.appendChild($tdFinSeg);

                const $tdIngreso = document.createElement('td');
                const $buttonIngreso = document.createElement('a');
                $buttonIngreso.setAttribute('class', 'btn bg-gradient-white btn-md');
                $buttonIngreso.href = `http://localhost/clinica_soft/venta/registro&id=${el.id_venta}`;
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
});