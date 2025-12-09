$(document).ready(function () {
    $('#tablaDatosUsuarios').DataTable({
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
            { data: 'id_user', 'visible': false },
            { data: 'rfc' },
            { data: 'nombre' },
            { data: 'apellido_paterno' },
            { data: 'apellido_materno' },
            {
                data: 'id_area',
                render: function (data, type, row) {
                    return row.area_nombre || data;
                }
            },
            { data: 'puesto' },
            { data: 'fecha_ingreso' },
            { data: 'email' },
            {
                data: 'status',
                render: function (data) {
                    return data === 'Activo' || data === true ?
                        '<span class="badge bg-success">✓ Activo</span>' :
                        '<span class="badge bg-danger">✗ Inactivo</span>';
                }
            },

            {
                data: 'id',
                render: function (data, type, row) {
                    var isActive = row.status === 'Activo';
                    var buttonText = isActive ? 'Desactivar' : 'Activar';
                    var buttonClass = isActive ? 'btn-danger' : 'btn-success';
                    var encryptedId = encodeURIComponent(data);


                    return `             
                    <div class="btn-group" role="group">         
                        <button class="btn btn-permissions-user" 
                            onclick="window.location.href='${url}/ssvv/permisos/${encryptedId}'">
                            Permisos
                        </button>
                    

                       <button class="btn btn-view" 
                            onclick="window.location.href='${url}/ssvv/ver/${encryptedId}'">
                            Ver
                        </button>

                        <button class="btn btn-edit" 
                                onclick="window.location.href='${url}/ssvv/editar/${encryptedId}'">
                            Editar
                        </button>
                        
                        <button class="btn ${buttonClass} cambio-status" 
                                data-id="${data}" 
                                data-id-raw="${row.id_raw}"
                                data-status="${isActive}">
                                ${buttonText}
                        </button>       
                    </div>
                    `;
                }
            },
        ],
    });

    $('#tablaDatosUsuarios').on('click', '.cambio-status', function () {
        var button = $(this);
        var encryptedId = button.data('id');
        var currentStatus = button.data('status');
        var action = currentStatus ? 'desactivar' : 'activar';
        var confirmMessage = `¿Estás seguro que deseas ${action} este empleado?`;

        if (confirm(confirmMessage)) {
            cambioUserStatus(encryptedId, button);
        }
    });
});

function cambioUserStatus(encryptedId, button) {
    var encodedId = encodeURIComponent(encryptedId);
    $.ajax({
        url: `${url}/ssvv/desactivar/${encodedId}`,
        type: 'PUT',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            _method: 'PUT'
        },
        beforeSend: function () {
            button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Procesando...');
        },
        success: function (response) {
            $('#tablaUsuarios').DataTable().ajax.reload();
            alert(response.mensaje || 'Estado actualizado correctamente');
        },
        error: function (xhr) {
            alert('Error al actualizar el estado');
            button.prop('disabled', false);
        }
    });
}

function verUsuario(encryptedId) {
    var encodedId = encodeURIComponent(encryptedId);
    window.location.href = `${url}/ssvv/ver/${encodedId}`;
}

function editarUsuario(encryptedId) {
    var encodedId = encodeURIComponent(encryptedId);
    window.location.href = `${url}/ssvv/editar/${encodedId}`;
}

function verPermisos(encryptedId) {
    var encodedId = encodeURIComponent(encryptedId);
    window.location.href = `${url}/ssvv/permisos/${encodedId}`;
}