$(document).ready(function () {
    $('#infoUsuarios').DataTable({
        scrollX: true,
        responsive: true,
        language: {
            url: `${url}/assets/js/datatables/1.1/es-es.json`,
        },
        ajax: {
            url: `${url}/ssvv/ajax/data/`,
            dataSrc: 'data'
        },
        columns: [
            { data: 'id', 'visible': false },
        ]
    });
});
