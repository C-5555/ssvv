$(document).ready(function () {
    $('#tablaUsuarios').DataTable({
        scrollX: true,
        responsive: true,
        language: {
            url: `${url}/assets/js/datatables/1.1/es-es.json`,
        }
    });

});