document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("kt_sign_in_form");
    const submitBtn = document.getElementById("kt_sign_in_submit");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");



    if (!form || !submitBtn) return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(form);

        submitBtn.disabled = true;
        const label = submitBtn.querySelector(".indicator-label");
        const progress = submitBtn.querySelector(".indicator-progress");
        if (label) label.style.display = "none";
        if (progress) progress.style.display = "inline-block";

        fetch(loginUrl, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json"
            },

            body: formData
        })
            .then(async response => {
                let data = {};
                try {
                    data = await response.json();
                } catch (err) {
                    throw new Error("Respuesta inválida del servidor");
                }

                if (response.status === 403) {
                    return Swal.fire({
                        icon: "warning",
                        title: "Usuario inactivo",
                        text: data.message || "Tu cuenta está inactiva."
                    });
                }

                if (!response.ok || !data.success) {
                    return Swal.fire({
                        icon: "error",
                        title: "Acceso denegado",
                        text: data.message || "No se pudo iniciar sesión."
                    });
                }

                await Swal.fire({
                    icon: "success",
                    title: "Bienvenido",
                    text: data.message || "Inicio de sesión correcto",
                    timer: 1300,
                    showConfirmButton: false
                });

                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error("Login fetch error:", error);
                Swal.fire({
                    icon: "error",
                    title: "Error de servidor",
                    text: error.message || "No se pudo procesar la solicitud."
                });
            })
            .finally(() => {
                submitBtn.disabled = false;
                if (label) label.style.display = "inline-block";
                if (progress) progress.style.display = "none";
            });
    });
});
