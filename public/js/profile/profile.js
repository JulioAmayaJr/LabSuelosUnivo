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

btnGuardarCambios.addEventListener('click', () => {
    
    if (validateInfoFields(txtEmail.value, txtPhone.value)){
        
        const formData = new FormData()
        formData.append("email", txtEmail.value)
        formData.append("phone", txtPhone.value)

        const url = "http://localhost/LabSuelosUnivo/public/profile/updateInfo";
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok){
                    location.href = "http://localhost/LabSuelosUnivo/public/profile"
                }
                else {
                    console.log(response);
                }
            })
            .then(data => {
                if (data === "Se actualizo :D") {
                    location.href = "http://localhost/LabSuelosUnivo/public/profile";
                }
                console.log(data)
            })
            .catch(error => {
                console.log(error);
            });
    }
    else {
        console.log("no se guardo :c")
    }
})

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
    if (validatePasswordFields){
        const formData = new FormData()
        formData.append("password", txtClaveNueva.value)

        const url = "http://localhost/LabSuelosUnivo/public/profile/updatePassword"

        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok){
                    location.href = "http://localhost/LabSuelosUnivo/public/profile"
                }
                else {
                    console.log(response);
                }
            })
            .then(data => {
                if (data === "Se actualizo :D") {
                    location.href = "http://localhost/LabSuelosUnivo/public/profile";
                }
                console.log(data)
            })
            .catch(error => {
                console.log(error);
            });
    }
})

function validatePasswordFields(){
    if (txtClaveActual.value === "" || txtClaveNueva.value === "" || txtConfirmarClave.value === "" ){
        Toastify({
            text: "Por favor, complete correctamente todos los campos.",
            duration: 3000
        }).showToast();
        return false
    }
    else {
        if (validateNewPassword()){
            return true
        }
        else {
            Toastify({
                text: "Los valores de contraseña nueva no coinciden",
                duration: 3000
            }).showToast();
        }
    }
}

function validateNewPassword() {
    if (txtClaveNueva.value !== "" && txtConfirmarClave.value !== ""){
        if (txtClaveNueva.value === txtConfirmarClave.value){
            return true
        }
        else {
            return false;
        }
    }
}