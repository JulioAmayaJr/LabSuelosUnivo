//capture fields from form

const txtId = document.getElementById('txtId')
const cboType = document.getElementById('cboType')
const txtName = document.getElementById('txtNombre')
const txtEmail = document.getElementById('txtCorreo')
const txtCellphone = document.getElementById('txtTelefono')
const cboDepartment = document.getElementById('cboDepartment')
const cboMunicipality = document.getElementById('cboMunicipality')
const txtNIT = document.getElementById('txtNIT')
const txtSpin = document.getElementById('txtGiro')
const txtReason = document.getElementById('txtRazon')
const txtDUI = document.getElementById('txtDUI')
const txtNoRegister= document.getElementById('txtNoRegistro')
const txtAddress = document.getElementById('txtAddress')

//capture buttons
const btnNewCustom = document.getElementById('btnNewCustom')
const btnSave = document.getElementById('btnSave')
const btnDelete = document.querySelectorAll(".delete-button")
const btnEdit = document.getElementById('btnEdit')

//Capture class to hide controls
const items = document.querySelectorAll(".hide")

let idTypeCustomer

const add = (customId) => {
    hideItems()
    const url = "http://localhost/LabSuelosUnivo/public/customer/getById/" + customId;
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok){
                return response.json()
            }
            else {

            }
        })
        .then(data =>{
            //const name_municipality = municipality(data.id_department)
            txtId.value = data.customer.id_customer
            txtName.value = data.customer.name_customer
            txtEmail.value = data.customer.email
            txtCellphone.value = data.customer.cell_phone
            cboMunicipality.value = data.customer.id_municipality
            txtNIT.value = data.customer.number_nit
            txtSpin.value = data.customer.spin
            txtReason.value = data.customer.social_reason
            txtDUI.value = data.customer.number_dui
            txtNoRegister.value = data.customer.no_register_nrc
            txtAddress.value = data.customer.address
            cboType.value = data.customer.id_type_customer
            idTypeCustomer= data.customer.id_type_customer

            department(data.municipality.id_deparment)
            //department(data.municipality.id_department)

            if(idTypeCustomer==1){
              hideItems(idTypeCustomer)
              //console.log(idTypeCustomer)
            }

        })
        .catch(error =>{
            console.log(error)
        })
}

const municipality = (munId) => {
    const url = "http://localhost/LabSuelosUnivo/public/customer/municipality/" + munId;
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok){
                return response.json()
            }
            else{

            }
        })
        .then(data => {
            data.forEach(element => {
                cboMunicipality.innerHTML += `
                    <option value="${element.id_municipality}">
                        ${element.name_municipality}
                    </option>
                `
            });
        })
        .catch(error =>{
            console.log(error)
        })
}

const department = (depId) => {
    const url = "http://localhost/LabSuelosUnivo/public/customer/department/" + depId;
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok){
                return response.json()
            }
            else{

            }
        })
        .then(data => {
            cboDepartment.value = data[0].id_deparment
        })
}

document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll("#tbdata .options button[data-id]")
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const customId = button.dataset.id

            add(customId)

        })
    })

    cboDepartment.addEventListener('change', () => {
        if (cboDepartment.value !== null){
            cboMunicipality.options.length = 0
            cboMunicipality.options[0] = new Option("-- Seleccionar un municipio --")
            municipality(cboDepartment.value)
        }
    })
})

cboType.addEventListener('change', () => {
    const selectedValue = cboType.value
    hideItems(selectedValue)
})

function hideItems (id){


    items.forEach((item) => {
        if (id === "1"){
            item.style.display = "none"
        }
        else {
            item.style.display = "block"
        }
    })
}

const postData = async () =>{
    const formData = new FormData()
    console.log(formData)
    formData.append("name_customer", txtName.value)
    formData.append("email", txtEmail.value)
    formData.append("cell_phone", txtCellphone.value)
    formData.append("id_municipality", cboMunicipality.value)
    formData.append("number_nit", txtNIT.value)
    formData.append("number_dui", txtDUI.value)
    formData.append("spin", txtSpin.value)
    formData.append("social_reason", txtReason.value)
    formData.append("no_register_nrc", txtNoRegister.value)
    formData.append("id_type_customer", cboType.value)
    formData.append("address", txtAddress.value)

    try {
        const response = await fetch("http://localhost/LabSuelosUnivo/public/customer/save",
        {
            method: "POST",
            body: formData
        })
        if (response.ok) {
            location.href = "http://localhost/LabSuelosUnivo/public/customer/"
        }
        else {
            console.log("error")
            console.log(response)
        }
    }
    catch(error){
        console.log(error)
    }
}

btnSave.addEventListener('click', () =>{

    if (txtId.value == 0){
        //Bloque para la creacion de un cliente
        postData();
    }
    else if(txtId.value > 0){
        //Bloque para la modificacion de un usuario
        const formData = new FormData()
        formData.append("name_customer", txtName.value)
        formData.append("email", txtEmail.value)
        formData.append("cell_phone", txtCellphone.value)
        formData.append("id_municipality", cboMunicipality.value)
        formData.append("number_dui", txtDUI.value)
        formData.append("number_nit", txtNIT.value)
        formData.append("spin", txtSpin.value)
        formData.append("social_reason", txtReason.value)
        formData.append("no_register_nrc", txtNoRegister.value)
        formData.append("id_type_customer", cboType.value)
        formData.append("address", txtAddress.value)
        console.log("ID del departamento"+cboDepartment.value)
        console.log("ID del municipio"+cboMunicipality.value)

        const url = "http://localhost/LabSuelosUnivo/public/customer/update/" + txtId.value
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok){
                    location.href = "http://localhost/LabSuelosUnivo/public/customer"
                }
                else {
                    console.log(response)
                }
            })
            .then(data => {
                if (data === "se actualizo"){
                    location.href = "http://localhost/LabSuelosUnivo/public/customer"
                }
                console.log(data)
            })
            .catch(error => {
                console.log(error)
            })
    }
})

//Limpiar campos
function clearFields() {
    txtId.value = "0"
    txtName.value = ""
    cboType.value = "-- Seleccione tipo de cliente --"
    txtEmail.value = ""
    txtCellphone.value = ""
    cboDepartment.value = ""
    cboMunicipality.value = ""
    txtNIT.value = ""
    txtSpin.value = ""
    txtReason.value = ""
    txtDUI.value = ""
    txtNoRegister.value = ""
    txtAddress.value = ""
}

btnNewCustom.addEventListener('click', () => {
    clearFields()
})

function validate(){

}

btnDelete.forEach(element => {
    element.addEventListener("click", function () {
        event.preventDefault();
        const id = element.getAttribute("data-id");
        const nombre = element.getAttribute("data-nombre");
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Se eliminara el cliente ' + nombre,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `http://localhost/LabSuelosUnivo/public/customer/delete/${id}`;
            }
        });
    });
});
