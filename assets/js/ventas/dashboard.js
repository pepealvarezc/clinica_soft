/* tabla proximos egresados por clinica */
document.addEventListener('DOMContentLoaded', function () {
    tableVenta = $('#proximosEgreso').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "autoWidth": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            type: 'POST',
            url: `${GLOBAL_URL}/venta/proximosEgresados`,
            mimeType: 'json',
            "dataSrc": ""
        },
        "columns": [
            {"data": "nombre_entidad"},
            {"data": "nombre_ip"},
            {"data": "fecha_alta_ing"},
            {"data": "fecha_estadia"},
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});

const fechaInicial = document.querySelector('#fechaInicial');


