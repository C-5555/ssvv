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
    $('#tablaUsuarios').on('click', '.cambio-status', function () {
        var button = $(this);
        var encryptedId = button.data('id');
        var currentStatus = button.data('status');
        var action = currentStatus ? 'desactivar' : 'activar';
        var confirmMessage = `¿Estás seguro que deseas ${action} este empleado?`;

        if (confirm(confirmMessage)) {
            cambioUserStatus(encryptedId, button);
        }


        function cambioUserStatus(encryptedId, button) {
            var encodedId = encodeURIComponent(encryptedId);
            $.ajax({
                url: `${url}/ssvv/desactivar/${encodedId}`,
                type: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Procesando...');
                },
                success: function (response) {
                    $('#tablaUsuarios').DataTable().ajax.reload();
                    alert(response.mensaje || 'Estado actualizado correctamente');
                }
            });
        }

        function verUsuario(encryptedId) {
            var encodedId = encodeURIComponent(encryptedId);
            window.location.href = `${url}/ssvv/ver/${encodedId}`;
        };


        function editarUsuario(encryptedId) {
            var encodedId = encodeURIComponent(encryptedId);
            console.log("estoy en el boton");
            window.location.href = `${url}/ssvv/editar/${encodedId}`;
        };



        function verPermisos(encryptedId) {
            var encodedId = encodeURIComponent(encryptedId);
            window.location.href = `${url}/ssvv/permisos/${encodedId}`;
        }

    });
});