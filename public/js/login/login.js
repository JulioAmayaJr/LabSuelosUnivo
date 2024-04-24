document.addEventListener("DOMContentLoaded", () => {
    const user_name = document.getElementById("user_name");
    const password = document.getElementById("password");
    const btnSubmit = document.getElementById("btnSubmit");

    btnSubmit.addEventListener("click", (e) => {
        e.preventDefault(); // Prevenir el envío del formulario para validar primero
        validate();
    });

    function validate() {
        if (user_name.value.trim() === "" || password.value.trim() === "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No deje campos vacíos",
            });
        } else {
            // Si los campos no están vacíos, envía el formulario
            btnSubmit.closest("form").submit();
        }
    }
});