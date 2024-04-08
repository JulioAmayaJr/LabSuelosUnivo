//capture fields from form

const txtId = document.getElementById('txtId')
const cboType = document.getElementById('cboType')
const txtNombre = document.getElementById('txtNombre')
const txtCorreo = document.getElementById('txtCorreo')
const txtTelefono = document.getElementById('txtTelefono')
const txtDepartment = document.getElementById('txtDepartment')
const txtMunicipality = document.getElementById('txtMunicipality')
const txtNIT = document.getElementById('txtNIT')
const txtGiro = document.getElementById('txtGiro')
const txtRazon = document.getElementById('txtRazon')
const txtDUI = document.getElementById('txtDUI')
const txtNoRegistro = document.getElementById('txtNoRegistro')
const txtAddress = document.getElementById('txtAddress')

//capture buttons
const btnNewCustom = document.getElementById('btnNewCustom')
const btnSave = document.getElementById('btnSave')
const btnDelete = document.getElementById('btnDelete')

//Capture class to hide controls
const items = document.querySelectorAll(".hide")

cboType.addEventListener('change', () => {
    const selectedValue = cboType.value

    items.forEach((item) => {
        if (selectedValue === "1"){
            item.style.display = "none"
        }
        else {
            item.style.display = "block"
        }
    })

})