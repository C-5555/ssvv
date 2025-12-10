$(document).ready(function () {

    $.validator.addMethod("pattern", function (value, element, param) {
        if (this.optional(element)) {
            return true;
        }
        let regex = new RegExp(param);
        return regex.test(value);
    }, "Formato inválido");


    $.validator.addMethod("rfc", function (value, element) {
        var pattern = /^[A-ZÑ&]{3,4}\d{8}[A-V1-9][A-Z1-9][0-9A]$/;
        return this.optional(element) || pattern.test(value.toUpperCase());
    }, "Por favor, ingresa un RFC válido (10 o 13 caracteres)");



    // Método para validar contraseña segura
    $.validator.addMethod("passwordSegura", function (value, element) {
        if (this.optional(element)) return true;

        // Mínimo 6 caracteres, al menos una mayúscula, una minúscula y un número
        var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
        return pattern.test(value);
    }, "La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número");

    // Método para validar fecha (formato YYYY-MM-DD)
    $.validator.addMethod("fechaValida", function (value, element) {
        if (this.optional(element)) return true;

        // Patrón para fecha YYYY-MM-DD
        var pattern = /^\d{4}-\d{2}-\d{2}$/;
        if (!pattern.test(value)) return false;

        // Verificar si es una fecha real
        var fecha = new Date(value);
        return fecha instanceof Date && !isNaN(fecha);
    }, "Por favor, ingresa una fecha válida (YYYY-MM-DD)");

    // Método para validar solo letras y espacios
    $.validator.addMethod("soloLetras", function (value, element) {
        if (this.optional(element)) return true;

        var pattern = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
        return pattern.test(value);
    }, "Este campo solo puede contener letras y espacios");

    $.validator.addMethod("correoBasico", function (value, element) {

        var pattern = /^[A-Za-z]+@[A-Za-z]+$/;
        return value.length <= 100 && pattern.test(value);
    }, "Correo inválido. Debe tener formato: letras + @ + letras.");

    $("#_form").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 2,
                maxlength: 50,
                soloLetras: true
            },
            apellido_paterno: {
                required: true,
                minlength: 2,
                maxlength: 50,
                soloLetras: true
            },
            apellido_materno: {
                required: true,
                minlength: 2,
                maxlength: 50,
                soloLetras: true
            },
            rfc: {
                required: true,
                rfc: true
            },
            nickname: {
                required: true,
                minlength: 3,
                maxlength: 30,
                pattern: /^[a-zA-Z0-9_]+$/
            },
            password: {
                required: true,
                minlength: 8,
                passwordSegura: true
            },
            id_area: {
                required: true,
                number: true
            },
            puesto: {
                required: true,
                minlength: 2,
                maxlength: 100
            },
            roles: {
                required: true
            },
            fecha_ingreso: {
                required: true,
                fechaValida: true
            },
            email: {
                required: true,
                email: true,
                maxlength: 100
            }
        },

        messages: {
            nombre: {
                required: "Por favor, ingresa el nombre",
                minlength: "El nombre debe tener al menos 2 caracteres",
                maxlength: "El nombre no puede exceder los 50 caracteres"
            },
            apellido_paterno: {
                required: "Por favor, ingresa el apellido paterno",
                minlength: "El apellido debe tener al menos 2 caracteres",
                maxlength: "El apellido no puede exceder los 50 caracteres"
            },
            apellido_materno: {
                required: "Por favor, ingresa el apellido materno",
                minlength: "El apellido debe tener al menos 2 caracteres",
                maxlength: "El apellido no puede exceder los 50 caracteres"
            },
            rfc: {
                required: "Por favor, ingresa el RFC"
            },
            nickname: {
                required: "Por favor, ingresa un nombre de usuario",
                minlength: "El nickname debe tener al menos 3 caracteres",
                maxlength: "El nickname no puede exceder los 30 caracteres",
                pattern: "Solo se permiten letras, números y guiones bajos (_)"
            },
            password: {
                required: "Por favor, ingresa una contraseña",
                minlength: "La contraseña debe tener al menos 6 caracteres"
            },
            confirmar_password: {
                required: "Por favor, confirma tu contraseña",
                equalTo: "Las contraseñas no coinciden"
            },
            id_area: {
                required: "Por favor, ingresa el área",
                number: "El área debe ser un número"
            },
            puesto: {
                required: "Por favor, ingresa el puesto",
                minlength: "El puesto debe tener al menos 2 caracteres",
                maxlength: "El puesto no puede exceder los 100 caracteres"
            },
            roles: {
                required: "Por favor, selecciona un rol"
            },
            fecha_ingreso: {
                required: "Por favor, ingresa la fecha de ingreso"
            },
            email: {
                required: "Por favor, ingresa el correo electrónico",
                email: "Por favor, ingresa un correo electrónico válido (ejemplo: usuario@dominio.com)",
                maxlength: "El correo no puede exceder los 100 caracteres"
            }
        },

        errorElement: 'span',
        errorClass: 'text-danger small d-block mt-1',
        errorPlacement: function (error, element) {
            // Insertar el mensaje de error después del elemento
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },
        highlight: function (element, errorClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
            $(element).closest('.mb-3').find('.form-control').addClass('is-invalid');
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
            $(element).closest('.mb-3').find('.form-control').removeClass('is-invalid').addClass('is-valid');
        },

        // Acción al enviar el formulario válido
        submitHandler: function (form) {
            console.log("Formulario válido. Enviando datos...");

            // Mostrar indicador de carga
            var submitBtn = $(form).find('button[type="submit"]');
            var originalText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Procesando...');

            // Envío con AJAX
            $.ajax({
                url: $(form).attr('action') || window.location.href,
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        // Mostrar mensaje de éxito
                        mostrarMensaje('success', response.message || 'Usuario creado exitosamente');

                        // Redirigir después de 2 segundos si hay URL de redirección
                        if (response.redirect) {
                            setTimeout(function () {
                                window.location.href = response.redirect;
                            }, 2000);
                        } else {
                            // Recargar la página
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    } else {
                        // Mostrar errores del servidor
                        mostrarMensaje('error', response.message || 'Error al crear el usuario');
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                },
                error: function (xhr, status, error) {
                    // Mostrar error de conexión
                    mostrarMensaje('error', 'Error de conexión: ' + error);
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });

            return false; // Evita el envío normal del formulario
        }
    });

    // Función para mostrar mensajes
    function mostrarMensaje(tipo, mensaje) {
        // Eliminar mensajes anteriores
        $('.alert-dismissible').remove();

        var alertClass = tipo === 'success' ? 'alert-success' : 'alert-danger';
        var icon = tipo === 'success' ? '✓' : '✗';

        var alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show mt-3" role="alert">
                <strong>${icon}</strong> ${mensaje}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        $('.card-body').prepend(alertHtml);

        // Auto-ocultar después de 5 segundos para éxito
        if (tipo === 'success') {
            setTimeout(function () {
                $('.alert-success').alert('close');
            }, 5000);
        }
    }

    // Validar RFC en tiempo real (para formato)
    $('#rfc').on('input', function () {
        var rfc = $(this).val().toUpperCase();
        if (rfc.length <= 13) {
            $(this).val(rfc);
        } else {
            $(this).val(rfc.substring(0, 13));
        }
    });

    // Validar que la fecha no sea futura
    $('#fecha_ingreso').on('change', function () {
        var fechaIngreso = new Date($(this).val());
        var hoy = new Date();

        if (fechaIngreso > hoy) {
            mostrarMensaje('warning', 'La fecha de ingreso no puede ser futura');
            $(this).val('');
        }
    });

    // Botón para mostrar/ocultar contraseña
    $('#password, #confirmar_password').after('<button type="button" class="btn btn-sm btn-outline-secondary mt-1 toggle-password">Mostrar</button>');

    $('.toggle-password').click(function () {
        var input = $(this).prev('input');
        var type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);
        $(this).text(type === 'password' ? 'Mostrar' : 'Ocultar');
    });
});