$(document).ready(function () {
    $('#tablaUsuarios').DataTable({
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
            { data: 'nombre' },
            { data: 'apellido_paterno' },
            { data: 'apellido_materno' },
            { data: 'id_departamento' },
            { data: 'puesto' },
            { data: 'fecha_ingreso' },
            { data: 'email' },
            { data: 'rfc' },
            {
                data: 'status',
                render: function (data) {
                    return data === 'Activo' ?
                        '<span class="text-success">✓ Activo</span>' :
                        '<span class="text-danger">Inactivo</span>';

                }
            },
            {
                data: 'id',
                render: function (data) {
                    return `
                        <a class="btn btn-primary">Ver</a> 
                        <a class="btn btn-primary">Editar</a>  
                        <button class="btn btn-danger">Eliminar</button>
                    `;
                }
            }
        ]
    });
    $('#tablaUsuarios').on('click', '.btn-danger, .btn-success', function () {
        var $button = $(this);
        var userId = $button.data('id');
        var action = $button.data('action');
    });
});