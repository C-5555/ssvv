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
                    if (data === 'activo') {
                        return '<span class="badge bg-success">✓ Activo</span>';
                    }

                    if (data === 'pendiente') {
                        return '<span class="badge bg-warning text-dark">⏳ Pendiente</span>';
                    }

                    return '<span class="badge bg-danger">✗ Inactivo</span>';
                }
            },

            {
                data: 'id',
                render: function (data, type, row) {
                    var isActive = row.status === 'activo';
                    var isPendiente = row.status === 'pendiente';

                    var buttonText = isActive ? 'Desactivar' : 'Activar';
                    var buttonClass = isActive ? 'btn-danger' : 'btn-success';

                    if (isPendiente) {
                        buttonText = 'Pendiente';
                        buttonClass = 'btn-warning disabled';
                    }


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
                                data-status="${isActive}"
                                ${isPendiente ? 'disabled' : ''}>
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

        Swal.fire({
            title: `¿Estás seguro que deseas ${action} este empleado?`,
            text: `El empleado será ${action}do.`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, continuar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                cambioUserStatus(encryptedId, button, action);
            }
        });
    });
});


function cambioUserStatus(encryptedId, button, action) {
    var encodedId = encodeURIComponent(encryptedId);

    $.ajax({
        url: `${url}/ssvv/desactivar/${encodedId}`,
        type: 'PUT',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            _method: 'PUT'
        },

        beforeSend: function () {
            button.prop('disabled', true)
                .html('<i class="fas fa-spinner fa-spin"></i>');
        },

        success: function (response) {
            $('#tablaDatosUsuarios').DataTable().ajax.reload(null, false);

            if (response.estado === 'pendiente') {
                Swal.fire({
                    icon: "info",
                    title: "Pendiente de firma",
                    text: response.mensaje,
                    confirmButtonText: "Entendido"
                }).then(() => {
                    $('#tablaDatosUsuarios').DataTable().ajax.reload(null, false);
                });
                return;
            }

            Swal.fire({
                icon: "success",
                title: `Empleado ${action}do correctamente`,
                text: response.mensaje,
                timer: 2000,
                showConfirmButton: false
            });

            button.prop('disabled', false);
        },


        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudo actualizar el estado",
                confirmButtonText: "Entendido"
            });
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