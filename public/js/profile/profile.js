const txtNombre = document.getElementById("txtNombre")
const txtEmail = document.getElementById("txtEmail")
const txtPhone = document.getElementById("txtPhone")
const txtRol = document.getElementById("txtRol")
const txtId = document.getElementById("txtId")
const succed = document.getElementById("succed")

const btnGuardarCambios = document.getElementById("btnGuardarCambios")

const txtClaveActual = document.getElementById("txtClaveActual")
const txtClaveNueva = document.getElementById("txtClaveNueva")
const txtConfirmarClave = document.getElementById("txtConfirmarClave")

const btnCambiarClave = document.getElementById("btnCambiarClave")



document.addEventListener("DOMContentLoaded", () =>{
   
})

function validateInfoFields(email, phone) {
    if (email === "" || phone === ""){
        Toastify({
            text: "Por favor, complete correctamente todos los campos.",
            duration: 3000
        }).showToast();
        return false;
    }
    else {
        return true
    }
}

btnCambiarClave.addEventListener('click', () => {
    if (txtClaveNueva.value && txtConfirmarClave.value && txtClaveNueva.value === txtConfirmarClave.value) {
        const formData = new FormData();
        formData.append('password', txtClaveNueva.value);

        const url = "http://localhost/LabSuelosUnivo/public/profile/updatePass";
        console.log("se esta mandando la contraseña: "+txtClaveNueva.value)
        fetch(url, {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (response.ok) {
                Toastify({

                    text: "El usuario se edito correctamente",
                    
                    duration: 3000
                    
                    }).showToast()
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
            } else {
                console.log(response);
                throw new Error('Error en la respuesta del servidor');
            }
        })
        .then(data => {
            if (data.message=== "Password actualizada correctamente") {
                location.href = "http://localhost/LabSuelosUnivo/public/profile";
            } else {
                console.log(data);
            }
        })
        .catch(error => {
            console.log(error);
        });
    } else {
        Toastify({

            text: "Las contraseñas no coinciden",
            
            duration: 3000
            
            }).showToast()
    }
})


document.querySelectorAll('.toggle-password').forEach(function (element) {
    element.addEventListener('click', function () {
        let input = this.previousElementSibling;
        if (input.type === 'password') {
            input.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
});