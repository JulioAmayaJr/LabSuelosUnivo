
function iniciarMap(coord) {

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: coord
    });
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    });
}

const btnNewProject = document.getElementById('btnNewProject');
const txtId = document.getElementById("txtId");
const txtName = document.querySelector('#txtName');
const cboCustomer = document.querySelector('#cboCustomer');
const txtlactitude = document.querySelector('#txtLactitud');
const txtlength = document.querySelector('#txtLongitud');
const divStatus = document.getElementById("divStatus");
const cboStatus = document.getElementById("cboStatus");
const btnSave = document.querySelector('#btnSave');
const btnDelete = document.querySelectorAll(".delete-button");

const add = (projectId) => {
    const url = "http://localhost/LabSuelosUnivo/public/project/getById/" + projectId;
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {

            }
        })
        .then(data => {
            txtName.value = data.name;
            cboCustomer.value = data.id_customer
            txtlactitude.value = data.lactitud
            txtlength.value = data.longitud
            txtId.value = data.id_project;
            divStatus.classList.remove("_hidden");

            if (data.status == 1) {
                cboStatus.selectedIndex = 0;
            } else {
                cboStatus.selectedIndex = 1;
            }
        })
        .catch(error => {
            console.log(error);
        });
};

btnSave.addEventListener('click', () => {

    if (txtId.value == 0) {
        if (validate()) {
            //Bloque para la creacion de un projecto
            postData();
        } else {
            console.log('Error de validacion');
        }
    } else if (txtId.value > 0) {
        //Bloque para la modificacion de un projecto
        const formData = new FormData();
        console.log(formData)
        formData.append("name", txtName.value);
        formData.append("id_customer", cboCustomer.value);
        formData.append("lactitud", txtlactitude.value);
        formData.append("longitud", txtlength.value);

        const url = "http://localhost/LabSuelosUnivo/public/project/update/" + txtId.value;
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    location.href = "http://localhost/LabSuelosUnivo/public/project";

                } else {
                    console.log(response);
                }
            }).then(data => {
                if (data === "Se actualizo :D") {
                    location.href = "http://localhost/LabSuelosUnivo/public/project";

                }
                console.log(data)
            })
            .catch(error => {
                console.log(error);
            });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll("#tbdata .options button[data-id]");
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const projectId = button.dataset.id;
            add(projectId);
        });
    });
    txtlactitude.addEventListener("keyup", () => {
        iniciarMap({ lat: parseFloat(txtlactitude.value), lng: parseFloat(txtlength.value) });
    })
    txtlength.addEventListener("keyup", () => {
        iniciarMap({ lat: parseFloat(txtlactitude.value), lng: parseFloat(txtlength.value) });
    })

    const url = "http://localhost/LabSuelosUnivo/public/project/getNumberProject";
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {

            }
        })
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.log(error);
        });





})



function validate() {
    if (txtName.value === "" || cboCustomer.value === "" || txtlactitude.value === "" || txtlength.value === "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "No puede dejar campos vacios",
        });
        return false;
    }
    return true;
}

btnNewProject.addEventListener("click", () => {
    clearFields();
    divStatus.classList.add("_hidden");
});

function clearFields() {
    txtName.value = "";
    cboCustomer.value = "--Seleccione un cliente--";
    txtlactitude.value = "";
    txtlength.value = "";
}

btnDelete.forEach(element => {
    element.addEventListener("click", function () {
        event.preventDefault();
        const id = element.getAttribute("data-id");
        const nombre = element.getAttribute("data-nombre");
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Se eliminara el projecto ' + nombre,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `http://localhost/LabSuelosUnivo/public/project/delete/${id}`;
            }
        });
    });
});

const postData = async () => {
    const formData = new FormData();
    console.log(formData)
    formData.append("name", txtName.value);
    formData.append("id_customer", cboCustomer.value);
    formData.append("lactitud", txtlactitude.value);
    formData.append("longitud", txtlength.value);
    try {
        const response = await fetch("http://localhost/LabSuelosUnivo/public/project/save",
            {
                method: "POST",
                body: formData
            });
        if (response.ok) {
            location.href = "http://localhost/LabSuelosUnivo/public/project/";
        } else {
            console.log("NOOO")
            console.log(response)
        }

    } catch (error) {
        console.log(error)
    }
}