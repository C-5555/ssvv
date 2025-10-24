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
                render: function (data, type, row) {
                    // Usar el status actual para determinar el estado                    
                    var isActive = row.status === 'Activo';
                    var buttonText = isActive ? 'Desactivar' : 'Activar';
                    var buttonClass = isActive ? 'btn-danger' : 'btn-success';
                    var icon = isActive ? 'fa-ban' : 'fa-check';


                    return `             
                    <div class="btn-group" role="group">               
                       <button class="btn btn-view" 
                                data-id="${data}"
                                onclick="window.location.href='${url}/ssvv/ver/${data}'">
                             Ver
                        </button>
                        <button class="btn btn-edit" 
                                data-id="${data}"
                                onclick="window.location.href='${url}/ssvv/editar/${data}'">
                            Editar
                        </button>
                        
                        <button class="btn ${buttonClass} cambio-status" 
                                data-id="${data}" 
                                data-status="${isActive}">
                                ${buttonText}
                            </button> 
                            `;
                }
            },
        ],
    });
    $('#tablaUsuarios').on('click', '.cambio-status', function () {
        var button = $(this);
        var userId = button.data('id');
        var currentStatus = button.data('status');
        var action = currentStatus ? 'desactivar' : 'activar';
        var confirmMessage = `¿Estás seguro que deseas ${action} este empleado?`;

        if (confirm(confirmMessage)) {
            cambioUserStatus(userId, button);
        }


        function cambioUserStatus(userId, button) {
            $.ajax({
                url: `${url}/ssvv/desactivar/${userId}`,
                type: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Procesando...');
                },
                success: function (response) {
                    // Recargar la tabla para reflejar los cambios
                    $('#tablaUsuarios').DataTable().ajax.reload();
                    alert(response.mensaje || 'Estado actualizado correctamente');
                },
                error: function (xhr) {
                    button.prop('disabled', false);
                    alert('Error al actualizar el estado: ' + (xhr.responseJSON?.message || 'Error desconocido'));
                }
            });
        }
        function verUsuario(encryptedId) {
            var encodedId = encodeURIComponent(encryptedId);
            window.location.href = `${url}/ssvv/ver/${encryptedId}`;
        };
        function editarUsuario(encryptedId) {
            var encodedId = encodeURIComponent(encryptedId);
            window.location.href = `${url}/ssvv/editar/${encryptedId}`;
        }

    });
});